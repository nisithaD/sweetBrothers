<?php

namespace App\Http\Livewire\Admin\Partners;

use App\partners;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $noPayOut;
    public $image, $input;

    protected $rules = [
        "input.title" => "required",
        'input.address' => "required",
        "input.contacts_full_name" => "required",
        "input.phone_number" => "required|numeric",
        "input.email" => "required|email",
        "input.password" => "required",
        "input.promo_code" => "required",
    ];

    public function addNewPartner()
    {
        $this->validate();
        $this->input['password'] = md5($this->input['password']);

        if (isset($this->image)) {
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/partners', 'customImageUpload');

            $this->input['image']=$this->image->hashName();
        }
        $partnersCreate = partners::create($this->input);

        if ($partnersCreate){
            // Add data in activeCampaign
            $this->ActiveCampaignAddData($this->input['email'],$this->input['contacts_full_name'],$this->input['phone_number']);

            if(isset($this->noPayOut) && $this->noPayOut == 'on')
            {
                $datas =  ['cmp_fname' => $this->input['title'], 'cmp_email' =>$this->input['email'], 'promo_code' => $this->input['promo_code'],'noPayout' => '1'];
            }
            else
            {
                $datas =  ['cmp_fname' => $this->input['title'], 'cmp_email' =>$this->input['email'], 'promo_code' => $this->input['promo_code'],'noPayout' => '0'];
            }

            Mail::send('admin.partners.partnersEmail',$datas, function($message) use ($datas)
            {
                $message->subject('Sweet Brothers Events | Thanks for signing up to our referral program.');
                $message->to($datas['cmp_email']);
            });


            $Registerdatas =  ['cmp_fname' => $this->input['title'], 'cmp_email' => $this->input['email'], 'password' => $this->input['password']];

            Mail::send('admin.partners.register',$Registerdatas, function($message) use ($Registerdatas)
            {
                $message->subject('Sweet Brothers Events | Your login details.');
                $message->to($Registerdatas['cmp_email']);
            });

            $this->input="";

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "New partner added successfully!"
            ]);
        }
    }

    function ActiveCampaignAddData($email, $first_name, $phone)
    {
        $url = 'https://sweetbrothers.api-us1.com';
        $params = array(
            'api_key'      => '3ed765c1a13d7e1ea595e832029b258c75814e3d3d329dce526daf25f2d0c179df2e7763',
            'api_action'   => 'contact_add',
            'api_output'   => 'serialize',
        );
        // here we define the data we are posting in order to perform an update
        $post = array(
            'email'                    => $email,
            'first_name'               => $first_name,
            'phone'                    => $phone,
            // assign to lists:
            'p[13]'                   => 13, // example list ID
            'status[13]'              => 1, // 1: active, 2: unsubscribed
            'instantresponders[13]' => 0, // set to 0 to if you don't want to sent instant autoresponders
        );

        $query = "";
        foreach( $params as $key => $value ) $query .= urlencode($key) . '=' . urlencode($value) . '&';
        $query = rtrim($query, '& ');

        // This section takes the input data and converts it to the proper format
        $data = "";
        foreach( $post as $key => $value ) $data .= urlencode($key) . '=' . urlencode($value) . '&';
        $data = rtrim($data, '& ');

        // clean up the url
        $url = rtrim($url, '/ ');

        if ( !function_exists('curl_init') ) die('CURL not supported. (introduced in PHP 4.0.2)');

        // If JSON is used, check if json_decode is present (PHP 5.2.0+)
        if ( $params['api_output'] == 'json' && !function_exists('json_decode') ) {
            die('JSON not supported. (introduced in PHP 5.2.0)');
        }

        // define a final API request - GET
        $api = $url . '/admin/api.php?' . $query;

        $request = curl_init($api); // initiate curl object
        curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
        curl_setopt($request, CURLOPT_POSTFIELDS, $data); // use HTTP POST to send form data
        curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);
        $response = (string)curl_exec($request); // execute curl post and store results in $response
        curl_close($request); // close curl object

        if ( !$response ) {
            die('Nothing was returned. Do you have a connection to Email Marketing server?');
        }
    }

    public function render()
    {
        return view('livewire.admin.partners.create')->extends('admin.layouts.main');
    }
}
