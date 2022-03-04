<?php

namespace App\Http\Livewire\Admin\ManagePackages\PackageTypes;

use App\landing_banners;
use App\package_banners;
use App\package_types;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Banners extends Component
{
    public $packageType, $images, $uploadImage;
    public $title,$sub_title;

    use WithFileUploads;

    protected $listeners = ['imageAdded' => 'incrementImageCount'];

    public function addTitle($imageId)
    {
        package_banners::where('id', $imageId)->update([
            'title' => $this->title,
            'sub_title'=>$this->sub_title
        ]);
        $this->mount($this->packageType->id);

        //alert
    }

    public function mount($id)
    {
        $this->packageType = package_types::findOrFail($id);
        $this->images = package_banners::where('package_type_id', $id)->get();
    }

    public function deleteImage($imageId)
    {
        $deletingImage = package_banners::where('id', $imageId)->first();
        File::delete(public_path() . '/img/package_types/' . $deletingImage['image']);
        package_banners::where('id', $imageId)->delete();

        $this->mount($this->packageType->id);
    }


    public function incrementImageCount($fileName)
    {
        $this->validate([
            'uploadImage' => 'image|max:2048', // 2MB Max
        ]);

        $this->uploadImage->store('/package_banners', 'customImageUpload');
        $package_images = new package_banners;
        $package_images->package_type_id = $this->packageType->id;
        $package_images->image = $this->uploadImage->hashName();
        $package_images->save();

        $this->mount($this->packageType->id);
    }

    public function render()
    {
        return view('livewire.admin.manage-packages.package-types.banners')->extends('admin.layouts.main');
    }
}
