<?php

namespace App\Http\Livewire\Admin\SiteSettings;

use App\contact;
use Livewire\Component;

class Index extends Component
{
    public $contact;
    public $facebook, $twitter, $instagram, $vimeo, $youtube, $map_link, $map_link_two, $phone, $email, $setupFee, $travelCost,
        $damageDeposit, $vat, $address, $address_two;

    public function mount($id)
    {
        $this->contact = contact::where('id', 1)->first();
        $this->facebook = $this->contact['facebook'];
        $this->twitter = $this->contact['twitter'];
        $this->instagram = $this->contact['instagram'];
        $this->vimeo = $this->contact['vimeo'];
        $this->youtube = $this->contact['youtube'];
        $this->address = $this->contact['address'];
        $this->address_two = $this->contact['address_two'];
        $this->map_link = $this->contact['map_link'];
        $this->map_link_two = $this->contact['map_link_two'];
        $this->phone = $this->contact['phone'];
        $this->email = $this->contact['email'];
        $this->setupFee = $this->contact['setupFee'];
        $this->travelCost = $this->contact['travelCost'];
        $this->damageDeposit = $this->contact['damageDeposit'];
        $this->vat = $this->contact['vat'];
    }

    public function updateData()
    {
        $contact = contact::where('id', 1)->update([
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'vimeo' => $this->vimeo,
            'youtube' => $this->youtube,
            'address' => $this->address,
            'address_two' => $this->address_two,
            'map_link' => $this->map_link,
            'map_link_two' => $this->map_link_two,
            'phone' => $this->phone,
            'email' => $this->email,
            'setupFee' => $this->setupFee,
            'travelCost' => $this->travelCost,
            'damageDeposit' => $this->damageDeposit,
            'vat' => $this->vat,
        ]);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Site data updated successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.site-settings.index')->extends('admin.layouts.main');
    }
}
