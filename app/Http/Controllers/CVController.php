<?php

namespace App\Http\Controllers;

use App\Models\CV;
use App\Services\PDFGeneratorService;
use Dompdf\Dompdf;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * @method authorize(string $string, CV|Collection|Model|null $cv)
 */
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

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'education.*.institution' => 'required|string|max:255',
            'education.*.degree' => 'required|string|max:255',
            'education.*.start_date' => 'required|date',
            'education.*.end_date' => 'nullable|date',
            'work_experience.*.company' => 'required|string|max:255',
            'work_experience.*.position' => 'required|string|max:255',
            'work_experience.*.start_date' => 'required|date',
            'work_experience.*.end_date' => 'nullable|date',
            'work_experience.*.description' => 'nullable|string',
        ]);

        $cv = CV::create(['user_id' => Auth::id()]);

        $cv->personalDetails()->create($request->only([
            'name', 'surname', 'phone_number', 'email', 'address', 'description', 'linkedin', 'github'
        ]));

        foreach ($request->education as $edu) {
            $cv->education()->create($edu);
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

    public function update(Request $request, $id): RedirectResponse
    {
        $cv = CV::findOrFail($id);

        $this->authorize('update', $cv);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'education.*.institution' => 'required|string|max:255',
            'education.*.degree' => 'required|string|max:255',
            'education.*.start_date' => 'required|date',
            'education.*.end_date' => 'nullable|date',
            'work_experience.*.company' => 'required|string|max:255',
            'work_experience.*.position' => 'required|string|max:255',
            'work_experience.*.start_date' => 'required|date',
            'work_experience.*.end_date' => 'nullable|date',
            'work_experience.*.description' => 'nullable|string',
        ]);

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
