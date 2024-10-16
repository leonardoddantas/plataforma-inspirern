<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $status = $request->status;

        $query = Business::query();

        if ($status) {
            $query->where('status', $status);
        }

        $businesses = $query->get();

        $pdf = PDF::loadView('pdf', compact('businesses'));

        return $pdf->setPaper('a4')->download('Relatorio_Negocios_Cadastrados.pdf');
    }
}
