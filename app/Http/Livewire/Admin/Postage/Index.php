<?php

namespace App\Http\Livewire\Admin\Postage;

use App\postage;
use Livewire\Component;

class Index extends Component
{
    public $postage;

    public function deletePostage($id)
    {
        postage::where('id', $id)->delete();
        $this->mount();
        //alert
    }

    public function mount()
    {
        $this->postage = postage::orderBy('price', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.admin.postage.index')->extends('admin.layouts.main');
    }
}
