<?php

namespace App\Http\Livewire\Admin\Partners;

use App\partners;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Index extends Component
{
    public $partners;

    public function mount()
    {
        $this->partners = partners::orderBy('id', 'DESC')->get();
    }

    public function deletePartner($id)
    {
        $partners = partners::find($id);
        File::delete(public_path() . '/img/partners/' . $partners['image']);
        $partners->delete();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Partner deleted successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.partners.index')->extends('admin.layouts.main');
    }
}
