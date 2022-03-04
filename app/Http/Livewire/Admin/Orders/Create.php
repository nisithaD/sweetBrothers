<?php

namespace App\Http\Livewire\Admin\Orders;

use App\manageOrder;
use App\partners;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;


class Create extends Component
{
    use withFileUploads;

    public $partners;
    public $input,$firstpaymentdate,$secondpaymentdate,$pdfFile;
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

    public function submit(){

        $this->validate();
        $this->input['bookingdate'] = date('Y-m-d',strtotime($this->input['bookingdate']));
        $this->input['deliverydate'] = date('Y-m-d',strtotime($this->input['deliverydate']));
        $this->input['firstpaymentdate'] = date('Y-m-d',strtotime($this->firstpaymentdate));
        $this->input['secondpaymentdate'] = date('Y-m-d',strtotime($this->secondpaymentdate));

        if (isset($this->pdfFile)) {
            $supported_types = [
                "pdf" => "Portable Document Format"
            ];
            $file_type = $this->pdfFile->getClientOriginalExtension();

            if(!array_key_exists($file_type, $supported_types)){
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'warning',
                    'message' => "Uploaded file format not valid!"
                ]);

            }
            $this->pdfFile->store('/', 'customPdfUpload');
            $this->input['pdfFile']=$this->pdfFile->hashName();
        }

        //create order
        $manageOrderCreate = manageOrder::create($this->input);


        if($manageOrderCreate)
        {
            if($this->input['first50'] == '1')
            {
                $partners = partners::where('id', $this->input['partners_id'])->first();
                $datas =  ['cmp_fname' => $this->input['ordername'], 'cmp_email' => $partners->email ,'customername' => $this->input['customername'], 'firstpaymentamount' => $this->input['firstpaymentamount'], 'firstpaymentdate' => $this->input['firstpaymentdate'],'partners_name' => $partners->title];

                Mail::send('admin.manage_orders.FirstPayoutemail',$datas, function($message) use ($datas)
                {
                    $message->subject('Sweet Brothers Events | Payout email');
                    $message->to($datas['cmp_email']);
                });

                Mail::send('admin.manage_orders.FirstpayoutAdmin',$datas, function($message) use ($datas)
                {
                    $message->subject('Sweet Brothers Events | Payout email');
                    $message->to('jerome@sweetbrothers.events');
                });
            }

            if($this->input['second50'] == '1')
            {
                $partners = partners::where('id', $this->input['partners_id'])->first();
                $datas =  ['cmp_fname' => $this->input['ordername'], 'cmp_email' => $partners->email ,
                    'customername' => $this->input['customername'], 'firstpaymentamount' => $this->input['firstpaymentamount'],
                    'firstpaymentdate' => $this->input['firstpaymentdate'],'partners_name' => $partners->title];

                Mail::send('admin.manage_orders.secondPayoutemail',$datas, function($message) use ($datas)
                {
                    $message->subject('Sweet Brothers Events | Payout email');
                    $message->to($datas['cmp_email']);
                });

                Mail::send('admin.manage_orders.secondPayoutAdmin',$datas, function($message) use ($datas)
                {
                    $message->subject('Sweet Brothers Events | Payout email');
                    $message->to('jerome@sweetbrothers.events');
                });
            }

            if($this->input['cancelorder'] == '1')
            {
                $partners = partners::where('id', $this->input['partners_id'])->first();
                $datas =  ['cmp_fname' => $this->input['ordername'], 'cmp_email' => $partners->email ,
                    'customername' => $this->input['customername'], 'firstpaymentamount' => $this->input['firstpaymentamount'],
                    'firstpaymentdate' => $this->input['firstpaymentdate'],'partners_name' => $partners->title];
                if($this->input['beforfirstpayment'] == '0')
                {
                    Mail::send('admin.manage_orders.canclebeforefirstpayment',$datas, function($message) use ($datas)
                    {
                        $message->subject('Sweet Brothers Events | Order cancelled - within cooling off period');
                        $message->to($datas['cmp_email']);
                    });
                }

                if($this->input['beforfirstpayment'] == '1')
                {
                    Mail::send('admin.manage_orders.cancleafterfirstpayment',$datas, function($message) use ($datas)
                    {
                        $message->subject('Sweet Brothers Events | Order cancelled - Outside of cooling');
                        $message->to($datas['cmp_email']);
                    });
                }
            }

        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Order created successfully!"
        ]);

    }

    public function mount()
    {
        $this->partners = partners::orderBy('title', 'ASC')->get();
    }

    public function render()
    {
        return view('livewire.admin.orders.create')->extends('admin.layouts.main');
    }
}
