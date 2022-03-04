<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\coupons;
use Livewire\Component;

class Edit extends Component
{
    public $title,$discount,$coupon;

    public function mount($id)
    {
        $this->coupon=coupons::findOrFail($id);
        $this->title=$this->coupon->title;
        $this->discount=$this->coupon->discount;
    }

    public function updateCoupon($id)
    {
        coupons::findOrFail($id)->update([
            'title'=>$this->title,
            'discount'=>$this->discount
        ]);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Coupon updated successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.coupons.edit')->extends('admin.layouts.main');
    }
}
