<?php

namespace App\Http\Livewire\Admin\ManageSalesProducts\Categories;

use App\categories;
use App\product_types;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $product_types,$input,$image;

    public function mount(){
        $this->product_types = product_types::where('sales', '1')->orderby('id', 'asc')->get();
    }

    public function createNewCategory(){

        if (isset($this->image)) {
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/categories', 'customImageUpload');

            $this->input['image']=$this->image->hashName();
        }

        $this->input['sales']=1;

        categories::create($this->input);

        $this->input="";

        //alert
    }

    public function render()
    {
        return view('livewire.admin.manage-sales-products.categories.create')->extends('admin.layouts.main');
    }
}
