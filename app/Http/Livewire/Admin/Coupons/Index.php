<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\coupons;
use Livewire\Component;

class Index extends Component
{
    public $coupons;

    public function mount()
    {
        $this->coupons = coupons::orderBy('discount', 'asc')->get();
    }

    public function deleteCoupon($id)
    {
        coupons::where('id',$id)->delete();
        $this->mount();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'warning',
            'message' => "Coupon deleted successfully!",
        ]);
    }

    public function render()
    {
        return view('livewire.admin.coupons.index')->extends('admin.layouts.main');
    }
}
