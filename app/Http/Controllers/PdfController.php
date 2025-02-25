<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function descargarFicha($id)
    {
        $producto = Producto::findOrFail($id);

        $pdf = Pdf::loadView('pdf.ficha', compact('producto'));

        return $pdf->download('Ficha_Tecnica_' . $producto->nombre . '.pdf');
    }
}
