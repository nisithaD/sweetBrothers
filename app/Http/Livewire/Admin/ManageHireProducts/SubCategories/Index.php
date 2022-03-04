<?php

namespace App\Http\Livewire\Admin\ManageHireProducts\SubCategories;

use App\categories;
use App\subcats;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Index extends Component
{
    public $cats,$subcats;

    public function mount()
    {
        $this->cats = categories::where('hire', '1')->orderBy('id', 'asc')->get();
        $this->subcats = subcats::where('hire', '1')->orderBy('id', 'asc')->get();
    }

    public function deleteSubCategory($id)
    {
        $sub_categories = subcats::find($id);
        File::delete(public_path() . '/img/subcats/' . $sub_categories['image']);
        $sub_categories->delete();
    }

    public function render()
    {
        return view('livewire.admin.manage-hire-products.sub-categories.index')->extends('admin.layouts.main');
    }
}
