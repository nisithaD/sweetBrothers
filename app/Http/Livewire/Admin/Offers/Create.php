<?php

namespace App\Http\Livewire\Admin\Offers;

use App\offers;
use Livewire\Component;

class Create extends Component
{
    public $input;

    protected $rules = [
        "input.title" => "required"
    ];

    public function submit()
    {
        $this->validate();
        offers::create($this->input);

        $this->reset();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Offer created successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.offers.create')->extends('admin.layouts.main');
    }
}
