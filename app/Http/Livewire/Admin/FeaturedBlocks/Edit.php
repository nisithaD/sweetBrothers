<?php

namespace App\Http\Livewire\Admin\FeaturedBlocks;

use App\featured_blocks;
use App\featured_pages;
use Livewire\Component;

class Edit extends Component
{
    public $featured,$blocks,$title,$content,$image,$imageDisplay;

    protected $rules = [
        'title' => 'required|min:2',
        'content' => 'required|min:5',
    ];

    public function mount($page_id,$block_id)
    {
        $this->featured = featured_pages::where('id', $page_id)->first();
        $this->blocks = featured_blocks::where('id', $block_id)->first();

        $this->title=$this->blocks->title;
        $this->content=$this->blocks->content;
        $this->imageDisplay=$this->blocks->image_disp;

    }
    public function editContentBlock($blockId)
    {
        //Todo recheck this
        $this->validate();

        featured_blocks::where('id',$blockId)->update([
            'title'=>$this->title,
            'content'=>$this->content,
            'image_disp'=>$this->imageDisplay,
        ]);
    }

    public function render()
    {
        return view('livewire.admin.featured-blocks.edit',['blocks'=>$this->blocks])->extends('admin.layouts.main');
    }
}
