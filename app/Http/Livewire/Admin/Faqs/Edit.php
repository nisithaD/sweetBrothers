<?php

namespace App\Http\Livewire\Admin\Faqs;

use App\faqs;
use Livewire\Component;

class Edit extends Component
{
    public $title,$content,$faqs;
    public function mount($id)
    {
        $this->faqs=faqs::findOrFail($id);

        $this->title=$this->faqs->title;
        $this->content=$this->faqs->content;
    }

    public function updateFaq($id)
    {
        $faqs=faqs::findOrFail($id);
        $faqs->update([
            'title'=>$this->title,
            'content'=>$this->content
        ]);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "FAQ updated successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.faqs.edit')->extends('admin.layouts.main');
    }
}
