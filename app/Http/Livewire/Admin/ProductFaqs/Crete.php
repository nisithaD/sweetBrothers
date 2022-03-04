<?php

namespace App\Http\Livewire\Admin\ProductFaqs;

use App\product_faqs;
use Livewire\Component;

class Crete extends Component
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
        product_faqs::create($this->input);

        $this->input="";

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Product FAQ created successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.product-faqs.crete')->extends('admin.layouts.main');
    }
}
