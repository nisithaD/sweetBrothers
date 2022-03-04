<?php

namespace App\Http\Livewire\Admin\LandingPages;

use App\landing_images;
use App\landing_pages;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Images extends Component
{
    public $landing,$images,$uploadImage;
    public $altTag;

    use WithFileUploads;
    protected $listeners = ['imageAdded' => 'incrementImageCount'];

    public function mount($id)
    {
        $this->landing = landing_pages::findOrFail($id);
        $this->images = landing_images::where('landing_page_id', $id)->get();
    }

    public function addAltTag($imageId)
    {
        landing_images::where('id',$imageId)->update([
            'title'=>$this->altTag
        ]);
        $this->mount($this->landing->id);

        //alert
    }

    public function deleteImage($imageId){
        $deletingImage=landing_images::where('id',$imageId)->first();
        File::delete(public_path() .'/img/landing_images/'.$deletingImage['image']);
        landing_images::where('id',$imageId)->delete();

        $this->mount($this->landing->id);
    }

    public function incrementImageCount($fileName)
    {
        $this->validate([
            'uploadImage' => 'image|max:2048', // 2MB Max
        ]);

        $this->uploadImage->store('/landing_images','customImageUpload');
        $landing_images = new landing_images;
        $landing_images->landing_page_id = $this->landing->id;
        $landing_images->image = $this->uploadImage->hashName();
        $landing_images->save();

        $this->mount($this->landing->id);
    }
    public function render()
    {
        return view('livewire.admin.landing-pages.images')->extends('admin.layouts.main');
    }
}
