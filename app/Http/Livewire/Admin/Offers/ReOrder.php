<?php

namespace App\Http\Livewire\Admin\Offers;

use App\offers;
use Livewire\Component;

class ReOrder extends Component
{
    public $offers;

    public function mount()
    {
        $this->offers = offers::orderBy('sort_order', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.admin.offers.re-order')->extends('admin.layouts.main');
    }
}
