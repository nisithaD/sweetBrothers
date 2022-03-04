<?php

namespace App\Http\Livewire\Admin\ManageSalesProducts\SubCategories;

use App\categories;
use App\subcats;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $cats,$input,$image;

    public function mount()
    {
        $this->cats = categories::where('sales', '1')->orderBy('id', 'asc')->get();
    }

    public function createNewSubCategory(){
        if (isset($this->image)) {
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/subcats', 'customImageUpload');

            $this->input['image']=$this->image->hashName();
        }

        $this->input['sales']=1;

        subcats::create($this->input);
        //alert
        $this->input="";
    }

    public function render()
    {
        return view('livewire.admin.manage-sales-products.sub-categories.create')->extends('admin.layouts.main');
    }
}
