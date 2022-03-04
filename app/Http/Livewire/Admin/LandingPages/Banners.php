<?php

namespace App\Http\Livewire\Admin\LandingPages;

use App\landing_banners;
use App\landing_images;
use App\landing_pages;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Banners extends Component
{
    public $landing, $images, $uploadImage;
    public $title;

    use WithFileUploads;

    protected $listeners = ['imageAdded' => 'incrementImageCount'];

    public function addTitle($imageId)
    {
        landing_banners::where('id', $imageId)->update([
            'title' => $this->title
        ]);
        $this->mount($this->landing->id);

        //alert
    }

    public function mount($id)
    {
        $this->landing = landing_pages::findOrFail($id);
        $this->images = landing_banners::where('landing_page_id', $id)->get();
    }

    public function deleteImage($imageId)
    {
        $deletingImage = landing_banners::where('id', $imageId)->first();
        File::delete(public_path() . '/img/landing_banners/' . $deletingImage['image']);
        landing_banners::where('id', $imageId)->delete();

        $this->mount($this->landing->id);
    }


    public function incrementImageCount($fileName)
    {
        $this->validate([
            'uploadImage' => 'image|max:2048', // 2MB Max
        ]);

        $this->uploadImage->store('/landing_banners', 'customImageUpload');
        $landing_images = new landing_banners;
        $landing_images->landing_page_id = $this->landing->id;
        $landing_images->image = $this->uploadImage->hashName();
        $landing_images->save();

        $this->mount($this->landing->id);
    }

    public function render()
    {
        return view('livewire.admin.landing-pages.banners')->extends('admin.layouts.main');
    }
}
