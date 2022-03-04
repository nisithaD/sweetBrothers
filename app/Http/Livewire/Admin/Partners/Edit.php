<?php

namespace App\Http\Livewire\Admin\Partners;

use App\partners;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $partner,$noPayOut,$input;
    public $title,$address,$phone_number,$contacts_full_name,$email,$password,$promo_code,$image,$oldPassword;
    public $bank_name,$account_name,$sort_code,$account_number;

    protected $rules  = [
        "title" => "required",
        'address' => "required",
        "contacts_full_name" => "required",
        "phone_number" => "required|numeric",
        "email" => "required|email",
        "promo_code" => "required",
    ];
    public function mount($id)
    {
        $this->partner=partners::where('id',$id)->first();

        $this->title=$this->partner->title;
        $this->address=$this->partner->address;
        $this->phone_number=$this->partner->phone_number;
        $this->contacts_full_name=$this->partner->contacts_full_name;
        $this->email=$this->partner->email;
        $this->oldPassword=$this->partner->password;
        $this->promo_code=$this->partner->promo_code;
    }

    public function editPartner()
    {
        $input['noPayOut'] = '0';

        if(isset($request->noPayOut) && $request->noPayOut == 'on')
        {
            $input['noPayOut'] = '1' ;
        }
        $input['title'] = $this->title;
        $input['address'] = $this->address;
        $input['contacts_full_name'] = $this->contacts_full_name;
        $input['phone_number'] = $this->phone_number;
        $input['email'] = $this->email;
        $input['promo_code'] = $this->promo_code;
        $input['bank_name'] = $this->bank_name;
        $input['account_name'] = $this->account_name;
        $input['sort_code'] = $this->sort_code;
        $input['account_number'] = $this->account_number;
        $input['image'] = $this->image;

        if (isset($this->image)) {
            File::delete(public_path() . '/img/partners/' . $this->partner['image']);
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/partners', 'customImageUpload');
            $this->input['image']=$this->image->hashName();
        }

        if(isset($this->password))
        {
            $input['password'] = md5($this->password);
        }
        else
        {
            $input['password'] = $this->oldPassword;
        }
        $partners = partners::where('id', $this->partner['id'])->update($input);

        if($partners && $this->password != '')
        {
            $Registerdatas =  ['cmp_fname' => $this->title, 'cmp_email' => $this->email, 'password' => $this->password];

            Mail::send('admin.partners.register',$Registerdatas, function($message) use ($Registerdatas)
            {
                $message->subject('Sweet Brothers Events | Your updated login details.');
                $message->to($Registerdatas['cmp_email']);
            });
        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Partner updated successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.partners.edit')->extends('admin.layouts.main');
    }
}
