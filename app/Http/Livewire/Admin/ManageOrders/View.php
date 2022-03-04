<?php

namespace App\Http\Livewire\Admin\ManageOrders;

use App\master_order;
use Livewire\Component;

class View extends Component
{
    public $order;

    public function mount($id)
    {
        $this->order = master_order::where('id',  $id)->with('cartproducts')->first();
    }

    public function render()
    {
        return view('livewire.admin.manage-orders.view')->extends('admin.layouts.main');
    }
}
