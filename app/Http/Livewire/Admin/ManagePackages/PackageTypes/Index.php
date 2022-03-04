<?php

namespace App\Http\Livewire\Admin\ManagePackages\PackageTypes;

use App\package_types;
use Livewire\Component;

class Index extends Component
{
    public $package_types;

    public function mount()
    {
        $this->package_types = package_types::orderBy('id', 'asc')->get();
    }

    public function deletePackageType($id)
    {
        $package_types = package_types::find($id);
//        $this->imagedelete($package_types['image'], 'package_types');
        $package_types->delete();

        //alert
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin.manage-packages.package-types.index')->extends('admin.layouts.main');
    }
}
