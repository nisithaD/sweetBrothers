<?php

namespace App\Http\Livewire\Admin\ProductFaqs;

use App\product_faqs;
use Livewire\Component;

class Index extends Component
{
    public $product_faqs;

    public function mount()
    {
        $this->product_faqs = product_faqs::orderBy('id', 'asc')->get();
    }

    public function deleteFaq($id)
    {
        $faqs = product_faqs::find($id);
        $faqs->delete();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "FAQ deleted successfully!"
        ]);
        $this->mount();
    }


    public function render()
    {
        return view('livewire.admin.product-faqs.index')->extends('admin.layouts.main');
    }
}
