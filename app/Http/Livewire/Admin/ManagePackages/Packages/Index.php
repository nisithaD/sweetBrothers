<?php

namespace App\Http\Livewire\Admin\ManagePackages\Packages;

use App\package_types;
use App\packages;
use Livewire\Component;

class Index extends Component
{
    public $types,$packages;

    public function mount()
    {
        $this->types = package_types::orderby('id', 'asc')->get();
        $this->packages = packages::orderBy('id', 'asc')->get();
    }

    public function deletePackage($id)
    {
        packages::where('id',$id)->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin.manage-packages.packages.index')->extends('admin.layouts.main');
    }
}
