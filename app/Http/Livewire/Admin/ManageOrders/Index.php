<?php

namespace App\Http\Livewire\Admin\ManageOrders;

use App\master_order;
use Livewire\Component;

class Index extends Component
{
    public $orders;

    public function mount()
    {
        $this->orders = master_order::where('transaction_id', '!=', '')->orderBy('created_at', 'DESC')->orderBy('id', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.admin.manage-orders.index')->extends('admin.layouts.main');
    }
}
