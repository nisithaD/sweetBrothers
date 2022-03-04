<?php

namespace App\Http\Livewire\Admin\Orders;

use App\manageOrder;
use App\partners;
use Livewire\Component;

class Edit extends Component
{
    public $partners;
    public $input;
    public $orderIdNo;
    public function mount($orderId){

        $this->orderIdNo=$orderId;

        $orderDetails=manageOrder::findOrFail($orderId);
        $this->input['ordername']=$orderDetails->ordername;
        $this->input['customername']=$orderDetails->customername;
        $this->input['bookingdate']=$orderDetails->bookingdate;
        $this->input['commission']=$orderDetails->commission;
        $this->input['partners_id']=$orderDetails->partners_id;
        $this->input['venuesname']=$orderDetails->venuesname;
        $this->input['deliverydate']=$orderDetails->deliverydate;
        $this->input['totalhire']=$orderDetails->totalhire;
        $this->input['totalcommissionpayable']=$orderDetails->totalcommissionpayable;
        $this->input['first50']=$orderDetails->first50;
        $this->input['firstpaymentdate']=$orderDetails->firstpaymentdate;
        $this->input['firstpaymentamount']=$orderDetails->firstpaymentamount;
        $this->input['second50']=$orderDetails->second50;
        $this->input['secondpaymentdate']=$orderDetails->secondpaymentdate;
        $this->input['secondpaymentamount']=$orderDetails->secondpaymentamount;
        $this->input['cancelorder']=$orderDetails->cancelorder;
//        $this->input['canceledBeforeFirstPayment']=$orderDetails->canceledBeforeFirstPayment;
        $this->input['firstcommission']=$orderDetails->firstcommission;
        $this->input['secondcommission']=$orderDetails->secondcommission;

        $this->partners = partners::orderBy('title', 'ASC')->get();
    }

    protected $rules = [
        'input.ordername' => 'required',
        'input.customername' => 'required',
        'input.bookingdate'=>'required',
        'input.venuesname' => "required",
        'input.commission' => "required",
        'input.partners_id' => "required",
        'input.deliverydate' => "required",
        'input.totalhire' => "required",
        'input.totalcommissionpayable' => 'required',
    ];

    public function updateData()
    {
        $this->validate();

        $manageOrderCreate = manageOrder::where('id',$this->orderIdNo)->update($this->input);
    }

    public function render()
    {
        return view('livewire.admin.orders.edit')->extends('admin.layouts.main');
    }
}
