<?php

namespace App\Http\Livewire\Admin\FeaturedPages;

use App\featured_banners;
use App\featured_images;
use App\featured_pages;
use App\landing_banners;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Banners extends Component
{
    public $featured,$images;
    public $uploadImage;
    public $title;

    use WithFileUploads;

    protected $listeners = ['imageAdded' => 'incrementImageCount'];

    public function mount($id)
    {
        $this->featured = featured_pages::findOrFail($id);
        $this->images = featured_banners::where('featured_page_id', $id)->get();
    }

    public function addTitle($imageId)
    {
        featured_banners::where('id', $imageId)->update([
            'title' => $this->title
        ]);
        $this->mount($this->featured->id);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Banner Image Title Added!"
        ]);
    }

    public function deleteImage($imageId)
    {
        $deletingImage = featured_banners::where('id', $imageId)->first();
        File::delete(public_path() . '/img/featured_banners/' . $deletingImage['image']);
        featured_banners::where('id', $imageId)->delete();

        $this->mount($this->featured->id);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Featured Banner Deleted!"
        ]);
    }

    public function incrementImageCount($fileName)
    {
        $this->validate([
            'uploadImage' => 'image|max:2048', // 2MB Max
        ]);

        $this->uploadImage->store('/featured_banners', 'customImageUpload');
        $featured_banners = new featured_banners;
        $featured_banners->featured_page_id = $this->featured->id;
        $featured_banners->image = $this->uploadImage->hashName();
        $featured_banners->save();

        $this->mount($this->featured->id);
    }

    public function render()
    {
        return view('livewire.admin.featured-pages.banners')->extends('admin.layouts.main');
    }
}
