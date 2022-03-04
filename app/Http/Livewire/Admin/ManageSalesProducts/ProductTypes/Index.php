<?php

namespace App\Http\Livewire\Admin\ManageSalesProducts\ProductTypes;

use App\product_types;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Index extends Component
{
    public $product_types;

    public function mount()
    {
        $this->product_types = product_types::where('sales', '1')->orderBy('id', 'asc')->get();
    }

    public function deleteProductType($id)
    {
        $product_types = product_types::find($id);
        File::delete(public_path() . '/img/product_types/' . $product_types['image']);
        $product_types->delete();

        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin.manage-sales-products.product-types.index')->extends('admin.layouts.main');
    }
}
