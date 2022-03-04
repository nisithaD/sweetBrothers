<?php

namespace App\Http\Livewire\Admin\LandingBlocks;

use App\landing_blocks;
use App\landing_pages;
use Livewire\Component;

class Index extends Component
{

    public $landing,$blocks;

    public function mount($id)
    {
        $this->landing = landing_pages::where('id', $id)->first();
        $this->blocks = landing_blocks::where('landing_id', $id)->orderby('id', 'asc')->get();
    }

    public function deleteContentBlock($landing_id,$block_id)
    {
        landing_blocks::where('id',$block_id)->delete();

        $this->mount($landing_id);
    }

    public function render()
    {
        return view('livewire.admin.landing-blocks.index')->extends('admin.layouts.main');
    }
}
