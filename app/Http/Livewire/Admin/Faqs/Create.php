<?php

namespace App\Http\Livewire\Admin\Faqs;

use App\faqs;
use Livewire\Component;

class Create extends Component
{
    public $input;

    public function createFAQ()
    {
        if (isset($this->image)) {
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/faqs', 'customImageUpload');

            $this->input['image']=$this->image->hashName();
        }
        faqs::create($this->input);

        $this->input="";

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "FAQ created successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.faqs.create')->extends('admin.layouts.main');
    }
}
