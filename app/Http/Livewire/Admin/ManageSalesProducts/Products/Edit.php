<?php

namespace App\Http\Livewire\Admin\ManageSalesProducts\Products;

use App\categories;
use App\product_types;
use App\products;
use App\subcats;
use Livewire\Component;

class Edit extends Component
{
    public $types, $cats, $subcats, $products;
    public $image, $uploadedImageName;

    public $title, $type_id, $category_id, $sub_category_id, $type_id_2, $category_id_2,
        $sub_category_id_2, $type_id_3, $category_id_3, $sub_category_id_3,
        $price, $youtube, $short_content, $content, $meta_title, $meta_description, $meta_keywords;


    public function mount($id)
    {
        $this->types = product_types::where('sales', '1')->orderBy('title', 'asc')->get();
        $this->cats = categories::where('sales', '1')->orderBy('title', 'asc')->get();
        $this->subcats = subcats::where('sales', '1')->orderBy('title', 'asc')->get();
        $this->products = products::findOrFail($id);

        $this->title = $this->products->title;
        $this->type_id = $this->products->type_id;
        $this->category_id = $this->products->category_id;
        $this->sub_category_id = $this->products->sub_category_id;
        $this->type_id_2 = $this->products->type_id_2;
        $this->category_id_2 = $this->products->category_id_2;
        $this->sub_category_id_2 = $this->products->sub_category_id_2;
        $this->type_id_3 = $this->products->type_id_3;
        $this->category_id_3 = $this->products->category_id_3;
        $this->sub_category_id_3 = $this->products->sub_category_id_3;
        $this->price = $this->products->price;
        $this->youtube = $this->products->youtube;
        $this->short_content = $this->products->short_content;
        $this->content = $this->products->content;
        $this->meta_title = $this->products->meta_title;
        $this->meta_description = $this->products->meta_description;
        $this->meta_keywords = $this->products->meta_keywords;
    }

    public function updateProduct($id)
    {
        if (isset($this->image)) {
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/products', 'customImageUpload');

            $this->uploadedImageName = $this->image->hashName();
        }

        products::where('id', $id)->update([
            'title' => $this->title,
            'sales' => 1,
            'type_id' => $this->type_id,
            'category_id' => $this->category_id,
            'sub_category_id' => $this->sub_category_id,
            'type_id_2' => $this->type_id_2,
            'category_id_2' => $this->category_id_2,
            'sub_category_id_2' => $this->sub_category_id_2,
            'image' => $this->uploadedImageName,
            'type_id_3' => $this->type_id_3,
            'category_id_3' => $this->category_id_3,
            'sub_category_id_3' => $this->sub_category_id_3,
            'price' => $this->price,
            'youtube' => $this->products->youtube,
            'short_content' => $this->short_content,
            'content' => $this->content,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
        ]);
    }

    //alert
    public function render()
    {
        return view('livewire.admin.manage-sales-products.products.edit')->extends('admin.layouts.main');
    }
}
