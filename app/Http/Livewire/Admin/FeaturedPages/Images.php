<?php

namespace App\Http\Livewire\Admin\FeaturedPages;

use App\featured_images;
use App\featured_pages;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Images extends Component
{
    public $featured,$images;
    public $uploadImage;

    use WithFileUploads;

    protected $listeners = ['imageAdded' => 'incrementImageCount'];

    public function mount($id)
    {
        $this->featured = featured_pages::findOrFail($id);
        $this->images = featured_images::where('featured_page_id', $id)->get();
    }

    public function incrementImageCount($fileName)
    {
        $this->validate([
            'uploadImage' => 'image|max:2048', // 2MB Max
        ]);

        $this->uploadImage->store('/featured_images', 'customImageUpload');
        $featured_images = new featured_images;
        $featured_images->featured_page_id = $this->featured->id;
        $featured_images->image = $this->uploadImage->hashName();
        $featured_images->save();

        $this->mount($this->featured->id);
    }

    public function deleteImage($imageId)
    {
        $deletingImage = featured_images::where('id', $imageId)->first();
        File::delete(public_path() . '/img/featured_images/' . $deletingImage['image']);
        featured_images::where('id', $imageId)->delete();

        $this->mount($this->featured->id);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Featured Image Deleted!"
        ]);
    }


    public function render()
    {
        return view('livewire.admin.featured-pages.images')->extends('admin.layouts.main');
    }
}
