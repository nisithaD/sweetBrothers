<?php

namespace App\Http\Controllers;

use App\master_quote;
use App\products;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    public function pdf($id)
    {
        $order = master_quote::where('id',  $id)->with('cartproducts')->first();
        $pdf = PDF::loadView('admin.quotes.pdf', compact('order'));
        return $pdf->stream('quote.pdf');
    }

    public function autoCompleteAjax(Request $request)
    {
        $search=  $request->term;

        $products = products::where('title','LIKE',"%{$search}%")
            ->with('images')
            ->orderBy('created_at','DESC')->limit(5)->get();

        if(!$products->isEmpty())
        {
            foreach($products as $key=>$product)
            {
                $new_row['title']= $product->title;
                $new_row['image']= $product->image;
                $row_set[] = $new_row; //build an array
            }
        }

        echo json_encode($row_set);

    }
}
