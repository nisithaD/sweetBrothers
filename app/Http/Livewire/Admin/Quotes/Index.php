<?php

namespace App\Http\Livewire\Admin\Quotes;

use App\master_quote;
use Livewire\Component;

class Index extends Component
{
    public $quotes;

    public function mount()
    {
        $this->quotes = master_quote::orderBy('created_at', 'DESC')->orderBy('id', 'ASC')->get();
    }

    public function render()
    {
        return view('livewire.admin.quotes.index')->extends('admin.layouts.main');
    }
}
