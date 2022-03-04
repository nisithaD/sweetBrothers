<?php

namespace App\Http\Livewire\Admin\Banners;

use App\Banners;
use App\content;
use App\profile;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $banners,$contents,$profile,$uploadImage,$updatedPage;

    protected $listeners = ['imageAdded' => 'incrementImageCount'];

    public function mount()
    {
        $this->banners = Banners::orderBy('sequence', 'asc')->get();
        $this->contents = content::latest()->where('banner_enabled', '0')->get();
        $this->profile = profile::where('id', '1')->first();
    }

    public function updatePage($bannerId)
    {
        dd($bannerId);
    }

    public function incrementImageCount()
    {
        $this->validate([
            'uploadImage' => 'image|max:2048', // 2MB Max
        ]);

        $this->uploadImage->store('/banners', 'customImageUpload');
        $banners = new Banners;
        $banners->banner = $this->uploadImage->hashName();
        $banners->save();

        $this->mount();
    }

    public function deleteBanner($id)
    {
        $deletingImage = Banners::where('id', $id)->first();
        File::delete(public_path() . '/img/banners/' . $deletingImage['banner']);
        Banners::where('id', $id)->delete();

        $this->mount();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Featured Banner Deleted!"
        ]);
    }


    public function render()
    {
        return view('livewire.admin.banners.index')->extends('admin.layouts.main');
    }
}
