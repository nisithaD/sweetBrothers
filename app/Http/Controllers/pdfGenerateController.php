<?php

namespace App\Http\Controllers;

use App\master_order;
use Barryvdh\DomPDF\Facade\Pdf;

class pdfGenerateController extends Controller
{
    public function pdf($id)
    {
        $order = master_order::where('id',  $id)->with('cartproducts')->first();
        $pdf = PDF::loadView('admin.orders.pdf', compact('order'));
        return $pdf->stream('invoice.pdf');
    }
}
