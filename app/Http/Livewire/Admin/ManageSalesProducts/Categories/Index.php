<?php

namespace App\Http\Livewire\Admin\ManageSalesProducts\Categories;

use App\categories;
use App\product_types;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Index extends Component
{

    public $product_types, $categories;

    public function mount()
    {
        $this->product_types = product_types::where('sales', 1)->get();
        $this->categories = categories::where('sales', '1')->orderBy('id', 'asc')->get();
    }

    public function deleteProductCategory($id)
    {
        $categories = categories::find($id);
        File::delete(public_path() . '/img/categories/' . $categories['image']);
        $categories->delete();

        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin.manage-sales-products.categories.index')->extends('admin.layouts.main');
    }
}
