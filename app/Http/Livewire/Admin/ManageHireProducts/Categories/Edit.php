<?php

namespace App\Http\Livewire\Admin\ManageHireProducts\Categories;

use App\categories;
use App\product_types;
use Livewire\Component;

class Edit extends Component
{
    public $categories,$product_types;

    public $title,$type,$contents,$image,$meta_title,$meta_description,$meta_keywords;

    public function mount($id)
    {
        $this->categories=categories::findOrFail($id);
        $this->product_types = product_types::where('hire', '1')->orderby('id', 'asc')->get();

        $this->title=$this->categories->title;
        $this->type=$this->categories->type;
        $this->contents=$this->categories->contents;
        $this->meta_title=$this->categories->meta_title;
        $this->meta_description=$this->categories->meta_description;
        $this->meta_keywords=$this->categories->meta_keywords;
    }

    public function updateCategory($id)
    {
        if (isset($this->image)) {
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/product_types', 'customImageUpload');
        }
        else{
            $this->image=$this->categories->image;
        }

        $categories=categories::findOrFail($id)->update([
            'title'=>$this->title,
            'type'=>$this->type,
            'content'=>$this->contents,
            'image'=>$this->image,
            'meta_title'=>$this->meta_title,
            'meta_description'=>$this->meta_description,
            'meta_keywords'=>$this->meta_keywords
        ]);

    }

    public function render()
    {
        return view('livewire.admin.manage-hire-products.categories.edit')->extends('admin.layouts.main');
    }
}
