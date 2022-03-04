<?php

namespace App\Http\Livewire\Admin\Postage;

use App\postage;
use Livewire\Component;

class Edit extends Component
{
    public $title,$price,$postage;

    public function mount($id)
    {
        $this->postage = postage::findOrFail($id);

        $this->title=$this->postage->title;
        $this->price=$this->postage->price;
    }

    public function updatePostage($id)
    {
        postage::findOrFail($id)->update([
            'title'=>$this->title,
            'price'=>$this->price
        ]);

        //alert
    }

    public function render()
    {
        return view('livewire.admin.postage.edit')->extends('admin.layouts.main');
    }
}
