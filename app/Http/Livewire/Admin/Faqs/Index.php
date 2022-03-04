<?php

namespace App\Http\Livewire\Admin\Faqs;

use App\faqs;
use Livewire\Component;

class Index extends Component
{
    public $faqs;

    public function mount()
    {
        $this->faqs = faqs::orderBy('id', 'asc')->get();
    }

    public function deleteFaq($id)
    {
        $faqs = faqs::find($id);
        $faqs->delete();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "FAQ deleted successfully!"
        ]);
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin.faqs.index')->extends('admin.layouts.main');
    }
}
