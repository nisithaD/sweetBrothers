<?php

namespace App\Http\Livewire\Admin\ManageHireProducts\Products;

use App\product_images;
use App\products;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class ExtraImages extends Component
{
    public $product,$images,$uploadImage;

    use WithFileUploads;
    protected $listeners = ['imageAdded' => 'incrementImageCount'];

    public function mount($id)
    {
        $this->product=products::findOrFail($id);
        $this->images = product_images::where('product_id', $id)->get();
    }

    public function incrementImageCount()
    {
        $this->validate([
            'uploadImage' => 'image|max:2048', // 2MB Max
        ]);

        $this->uploadImage->store('/productimg','customImageUpload');
        $product_images = new product_images;
        $product_images->product_id = $this->product->id;
        $product_images->image = $this->uploadImage->hashName();
        $product_images->save();

        $this->mount($this->product->id);

        //alert
    }

    public function deleteImage($imageId)
    {
        $deletingImage=product_images::where('id',$imageId)->first();
        File::delete(public_path() .'/img/landing_images/'.$deletingImage['image']);
        product_images::where('id',$imageId)->delete();

        $this->mount($this->product->id);
    }

    public function render()
    {
        return view('livewire.admin.manage-hire-products.products.extra-images')->extends('admin.layouts.main');
    }
}
