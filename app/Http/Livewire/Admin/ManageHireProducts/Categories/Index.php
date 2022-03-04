<?php

namespace App\Http\Livewire\Admin\ManageHireProducts\Categories;

use App\categories;
use App\product_types;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Index extends Component
{
    public $product_types, $categories;

    public function mount()
    {
        $this->product_types = product_types::where('hire', '1')->orderby('id', 'asc')->get();
        $this->categories = categories::where('hire', '1')->orderBy('id', 'asc')->get();
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
        return view('livewire.admin.manage-hire-products.categories.index')->extends('admin.layouts.main');
    }
}
