<?php

namespace App\Http\Livewire\Admin\ManageHireProducts\Products;

use App\categories;
use App\product_types;
use App\products;
use App\subcats;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    public $types,$cats,$subcats;
    public $input,$image;

    use WithFileUploads;

    public function mount()
    {
        $this->types = product_types::where('hire', '1')->orderBy('title', 'asc')->get();
        $this->cats = categories::where('hire', '1')->orderBy('title', 'asc')->get();
        $this->subcats = subcats::where('hire', '1')->orderBy('title', 'asc')->get();
    }
    protected $rules=[
        "title" => "required"
    ];

    public function createNewProduct()
    {
        if (isset($this->image)) {
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/products', 'customImageUpload');

            $this->input['image']=$this->image->hashName();
        }
        $this->input['hire']=1;

        products::create($this->input);
        //alert
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.manage-hire-products.products.create')->extends('admin.layouts.main');
    }
}
