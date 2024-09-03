<?php

namespace App\Services;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class PDFGeneratorService
{
    public function generateCV($cv): Dompdf
    {
        $dompdf = new Dompdf();
        $html = View::make('cv.pdf', compact('cv'))->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('cv.pdf', ['Attachment' => true]);
    }
}
