<?php

namespace App\Http\Livewire\Admin\ManagePackages\Packages;

use App\package_types;
use App\packages;
use Livewire\Component;

class Create extends Component
{
    public $types;
    public $input;

    protected $rules = [
        'input.title' => 'required|min:2',
    ];

    public function savePackage()
    {
        packages::create($this->input);
    }

    public function mount(){
        $this->types = package_types::orderby('id', 'asc')->get();
    }
    public function render()
    {
        return view('livewire.admin.manage-packages.packages.create')->extends('admin.layouts.main');
    }
}
