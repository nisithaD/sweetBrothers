<?php

namespace App\Http\Livewire\Admin\ProductFaqs;

use App\faqs;
use App\product_faqs;
use Livewire\Component;

class Edit extends Component
{
    public $title,$content,$faqs;
    public function mount($id)
    {
        $this->faqs=product_faqs::findOrFail($id);

        $this->title=$this->faqs->title;
        $this->content=$this->faqs->content;
    }

    public function updateFaq($id)
    {
        $faqs=product_faqs::findOrFail($id);
        $faqs->update([
            'title'=>$this->title,
            'content'=>$this->content
        ]);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Product FAQ updated successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.product-faqs.edit')->extends('admin.layouts.main');
    }
}
