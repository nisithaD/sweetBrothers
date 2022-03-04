<?php

namespace App\Http\Livewire\Admin\Offers;

use App\offers;
use Livewire\Component;

class Index extends Component
{
    public $offers;

    public function mount()
    {
        $this->offers = offers::orderBy('sort_order', 'asc')->get();
    }

    public function delete($id){
        $offers = offers::find($id);
        $offers->delete();

        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin.offers.index')->extends('admin.layouts.main');
    }
}
