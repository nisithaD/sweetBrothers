<?php

namespace App\Http\Livewire\Admin\Postage;

use App\postage;
use Livewire\Component;

class Create extends Component
{
    public $title,$price;

    public function createCoupon()
    {
        postage::create([
            'title'=>$this->title,
            'price'=>$this->price
        ]);

        $this->reset();
    }



    public function render()
    {
        return view('livewire.admin.postage.create')->extends('admin.layouts.main');
    }
}
