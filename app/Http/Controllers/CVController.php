<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCVRequest;
use App\Http\Requests\UpdateCVRequest;
use App\Models\CV;
use App\Services\PDFGeneratorService;
use Dompdf\Dompdf;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CVController extends Controller
{
    use AuthorizesRequests;

    protected PDFGeneratorService $pdfService;

    public function __construct(PDFGeneratorService $pdfService)
    {
        $this->pdfService = $pdfService;
    }

    public function index(): View|Factory|Application
    {
        $cvs = CV::with(['personalDetails', 'education', 'workExperience'])
            ->where('user_id', Auth::id())
            ->get();

        return view('cv.index', compact('cvs'));
    }

    public function create(): View|Factory|Application
    {
        return view('cv.create');
    }

    public function store(StoreCVRequest $request): RedirectResponse
    {
        $cv = CV::create(['user_id' => Auth::id()]);

        $cv->personalDetails()->create($request->only([
            'name', 'surname', 'phone_number', 'email', 'address', 'description', 'linkedin', 'github'
        ]));

        foreach ($request->education as $education) {
            $cv->education()->create($education);
        }

        foreach ($request->work_experience as $work) {
            $cv->workExperience()->create($work);
        }

        return redirect()->route('cvs.index')->with('success', 'CV created successfully.');
    }

    public function edit($id): View|Factory|Application
    {
        $cv = CV::with(['personalDetails', 'education', 'workExperience'])->findOrFail($id);

        $this->authorize('update', $cv);

        return view('cv.edit', compact('cv'));
    }

    public function update(UpdateCVRequest $request, $id): RedirectResponse
    {
        $cv = CV::findOrFail($id);

        $this->authorize('update', $cv);

        $cv->personalDetails->update($request->only([
            'name', 'surname', 'phone_number', 'email', 'address', 'description', 'linkedin', 'github'
        ]));

        $cv->education()->delete();
        foreach ($request->education as $edu) {
            $cv->education()->create($edu);
        }

        $cv->workExperience()->delete();
        foreach ($request->work_experience as $work) {
            $cv->workExperience()->create($work);
        }

        return redirect()->route('cvs.index')->with('success', 'CV updated successfully.');
    }

    public function show($id): View|Factory|Application
    {
        $cv = CV::with(['personalDetails', 'education', 'workExperience'])->findOrFail($id);

        $this->authorize('view', $cv);

        return view('cv.show', compact('cv'));
    }

    public function destroy($id): RedirectResponse
    {
        $cv = CV::findOrFail($id);

        $this->authorize('delete', $cv);

        $cv->delete();

        return redirect()->route('cvs.index')->with('success', 'CV deleted successfully.');
    }

    public function generatePDF($id): Dompdf
    {
        $cv = CV::with(['personalDetails', 'education', 'workExperience'])->findOrFail($id);

        $this->authorize('view', $cv);

        return $this->pdfService->generateCV($cv);
    }
}
