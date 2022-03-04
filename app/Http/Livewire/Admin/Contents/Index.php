<?php

namespace App\Http\Livewire\Admin\Contents;

use App\content;
use Livewire\Component;

class Index extends Component
{
    public $content;

    public function mount()
    {
        $this->contents = content::orderBy('id', 'ASC')->get();
    }

    public function render()
    {
        return view('livewire.admin.contents.index')->extends('admin.layouts.main');
    }
}
