<?php

namespace App\Http\Livewire\Admin\LandingBlocks;

use App\landing_blocks;
use App\landing_pages;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $landing_id,$image,$title,$content,$imageDisplay;

    public function mount($id)
    {
        $this->landing_id = $id;
    }

    protected $rules = [
        'title' => 'required|min:2',
    ];

    public function createNewContentBlock($id)
    {
        landing_blocks::create([
            'title'=>$this->title,
            'landing_id'=>$id,
            'content'=>$this->content,
            'image'=>$this->image,
            'image_disp'=>$this->imageDisplay
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.landing-blocks.create')->extends('admin.layouts.main');
    }
}
