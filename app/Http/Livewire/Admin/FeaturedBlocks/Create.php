<?php

namespace App\Http\Livewire\Admin\FeaturedBlocks;

use App\featured_blocks;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $image,$title,$content,$imageDisplay,$featured_id,$uploadedImage;

    public function mount($id)
    {
       $this->featured_id=$id;
    }

    public function createNewContentBlock()
    {
        if (isset($this->image)) {
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/featured_blocks', 'customImageUpload');

            $this->uploadedImage=$this->image->hashName();
        }

        featured_blocks::create([
            'title'=>$this->title,
            'featured_id'=>$this->featured_id,
            'content'=>$this->content,
            'image'=>$this->uploadedImage,
            'image_disp'=>$this->imageDisplay
        ]);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Featured Page Content Block Added!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.featured-blocks.create')->extends('admin.layouts.main');
    }
}
