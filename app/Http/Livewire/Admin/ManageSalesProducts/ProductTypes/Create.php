<?php

namespace App\Http\Livewire\Admin\ManageSalesProducts\ProductTypes;

use App\product_types;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $input, $image;

    protected $rules = [
        "input.title" => "required"
    ];

    public function createNewProductType()
    {
        if (isset($this->image)) {
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/product_types', 'customImageUpload');

            $this->input['image']=$this->image->hashName();
        }

        $this->input['sales']=1;

        product_types::create($this->input);
        //alert
        $this->input="";

    }

    public function render()
    {
        return view('livewire.admin.manage-sales-products.product-types.create')->extends('admin.layouts.main');
    }
}
