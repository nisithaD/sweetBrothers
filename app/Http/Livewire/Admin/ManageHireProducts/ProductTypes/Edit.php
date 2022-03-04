<?php

namespace App\Http\Livewire\Admin\ManageHireProducts\ProductTypes;

use App\product_types;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $product_types;

    public $title,$content,$meta_title,$meta_description,$meta_keywords,$image;

    public function mount($id)
    {
        $this->product_types=product_types::findOrFail($id);

        $this->title=$this->product_types->title;
        $this->content=$this->product_types->content;
        $this->meta_title=$this->product_types->meta_title;
        $this->meta_description=$this->product_types->meta_description;
        $this->meta_keywords=$this->product_types->meta_keywords;
    }

    public function updateProductTypes($id)
    {
        if (($this->image)) {
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/product_types', 'customImageUpload');
        }

        product_types::where('id',$id)->update([
            'title'=>$this->title,
            'content'=>$this->content,
            'image'=>$this->image->hashName(),
            'meta_title'=>$this->meta_title,
            'meta_description'=>$this->meta_description,
            'meta_keywords'=>$this->meta_keywords
        ]);
        //alert
    }

    public function render()
    {
        return view('livewire.admin.manage-hire-products.product-types.edit')->extends('admin.layouts.main');
    }
}
