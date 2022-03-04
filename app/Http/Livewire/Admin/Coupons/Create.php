<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\coupons;
use Livewire\Component;

class Create extends Component
{
    public $title, $discount;

    public function createCoupon()
    {
        $this->validate([
            'title'=>'required',
        ]);
        coupons::create([
           'title'=>$this->title,
           'discount'=>$this->discount
        ]);
        $this->reset();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Coupon added successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.coupons.create')->extends('admin.layouts.main');
    }
}
