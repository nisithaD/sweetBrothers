<?php

namespace App\Http\Livewire\Admin\ManageSalesProducts\Products;

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
        $this->types = product_types::where('sales', '1')->orderBy('title', 'asc')->get();
        $this->cats = categories::where('sales', '1')->orderBy('title', 'asc')->get();
        $this->subcats = subcats::where('sales', '1')->orderBy('title', 'asc')->get();
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
        $this->input['sales']=1;

        products::create($this->input);
        //alert
        $this->input="";
    }

    public function render()
    {
        return view('livewire.admin.manage-sales-products.products.create')->extends('admin.layouts.main');
    }
}
