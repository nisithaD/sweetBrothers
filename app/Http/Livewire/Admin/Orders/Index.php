<?php

namespace App\Http\Livewire\Admin\Orders;

use App\manageOrder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $orderLists;

    public function mount(){
        $this->orderLists =  DB::table('manageOrder')
            ->select('manageOrder.*','partners.title AS partnersName')
            ->leftjoin('partners','partners.id','=','manageOrder.partners_id')
            ->orderBy('manageOrder.id','DESC')
            ->get();
    }

    public function deleteOrder($orderId)
    {
        $manageOrderCreate = manageOrder::where('id',$orderId)->delete();
        $this->mount();
        $this->render();
    }

    public function render()
    {
        return view('livewire.admin.orders.index')->extends('admin.layouts.main');
    }
}
