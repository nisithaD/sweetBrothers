<?php

namespace App\Http\Livewire\Admin\FeaturedBlocks;

use App\featured_blocks;
use App\featured_pages;
use Livewire\Component;

class Index extends Component
{
    public $featured, $blocks;

    public function mount($id)
    {
        $this->featured = featured_pages::where('id', $id)->first();
        $this->blocks = featured_blocks::where('featured_id', $id)->orderby('id', 'asc')->get();
    }


    public function deleteContentBlock($featuredId, $blockId)
    {
        $blocks = featured_blocks::find($blockId);
        $blocks->delete();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Featured Page Content Deleted!"
        ]);

        $this->mount($featuredId);
    }

    public function render()
    {
        return view('livewire.admin.featured-blocks.index')->extends('admin.layouts.main');
    }
}
