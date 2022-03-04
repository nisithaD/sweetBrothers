<?php

namespace App\Http\Livewire\Admin\ManageSalesProducts\SubCategories;

use App\categories;
use App\subcats;
use Livewire\Component;

class Edit extends Component
{
    public $cats,$subcats;
    public $title,$category_id,$contents,$image,$meta_title,$meta_description,$meta_keywords;
    public function mount($id)
    {
        $this->cats = categories::where('sales', '1')->orderBy('id', 'asc')->get();
        $this->subcats=subcats::findOrFail($id);

        $this->title=$this->subcats->title;
        $this->category_id=$this->subcats->category_id;
        $this->contents=$this->subcats->contents;
        $this->meta_title=$this->subcats->meta_title;
        $this->meta_description=$this->subcats->meta_description;
        $this->meta_keywords=$this->subcats->meta_keywords;
    }

    public function updateSubCategory($id)
    {
        if (($this->image)) {
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/product_types', 'customImageUpload');
        }
        else{
            $this->image=$this->subcats->image;
        }

        $sub_categories=subcats::findOrFail($id)->update([
            'title'=>$this->title,
            'category_id'=>$this->category_id,
            'content'=>$this->contents,
            'image'=>$this->image,
            'meta_title'=>$this->meta_title,
            'meta_description'=>$this->meta_description,
            'meta_keywords'=>$this->meta_keywords
        ]);

        //alert
    }

    public function render()
    {
        return view('livewire.admin.manage-sales-products.sub-categories.edit')->extends('admin.layouts.main');
    }
}
