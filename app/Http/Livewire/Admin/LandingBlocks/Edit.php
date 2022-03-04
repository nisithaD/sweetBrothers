<?php

namespace App\Http\Livewire\Admin\LandingBlocks;

use App\featured_blocks;
use App\landing_blocks;
use App\landing_pages;
use Livewire\Component;

class Edit extends Component
{
    public $landing_id, $landing, $blocks, $title, $content, $imageDisplay;

    public function mount($page_id, $block_id)
    {
        $this->landing = landing_pages::where('id', $page_id)->first();
        $this->blocks = landing_blocks::where('id', $block_id)->first();
        $this->landing_id = $this->landing->id;

        $this->title = $this->blocks->title;
        $this->content = $this->blocks->content;
        $this->imageDisplay = $this->blocks->image_disp;
    }

    public function editContentBlock($blockId,$landing_id)
    {
        landing_blocks::where('id',$blockId)->where('landing_id',$landing_id)->update([
            'title'=>$this->title,
            'content'=>$this->content,
            'image_disp'=>$this->imageDisplay,
        ]);

    }

    public function render()
    {
        return view('livewire.admin.landing-blocks.edit')->extends('admin.layouts.main');
    }
}
