<?php

namespace App\Http\Livewire\Admin\Banners;

use App\Banners;
use App\content;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    public $banner,$title,$sub_title,$image,$uploadedImage,$banners,$contents,$pageName;

    use WithFileUploads;

    public function mount($id)
    {
        $this->banner=Banners::where('id', $id)->first();
        $this->title=$this->banner->title;
        $this->sub_title=$this->banner->sub_title;
        $this->pageName=$this->banner->page;
        $this->uploadedImage=$this->banner->banner;

        $this->banners = Banners::orderBy('sequence', 'asc')->get();
        $this->contents = content::latest()->where('banner_enabled', '0')->get();
    }

    public function updateBanner($id)
    {
        if (isset($this->image)) {
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/banners', 'customImageUpload');

            $this->uploadedImage=$this->image->hashName();
        }

        Banners::where('id', $id)->update([
            'title'=>$this->title,
            'sub_title'=>$this->sub_title,
            'banner'=>$this->uploadedImage,
            'page'=>$this->pageName,
        ]);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Banner updated successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.banners.edit')->extends('admin.layouts.main');
    }
}
