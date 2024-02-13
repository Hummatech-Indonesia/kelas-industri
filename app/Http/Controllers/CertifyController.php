<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CertifyController extends Controller
{
    /**
     * exportPdf
     *
     * @return void
     */
    public function exportPdf(Request $request)
    {
        // $data['consultantProjects'] = $this->consultantProject->search($request);
        // $pdf = Pdf::loadView('exports.consultant-package-pdf', $data);

        // return $pdf->download('Paket Konsultan.pdf');
        return view('exports.certify');
    }
}
