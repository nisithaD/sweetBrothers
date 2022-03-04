<?php

namespace App\Http\Livewire\Admin\ManagePackages\PackageTypes;

use App\package_types;
use Livewire\Component;

class Edit extends Component
{
    public $package_types;
    public $title,$contents,$meta_title,$meta_description,$meta_keywords;

    public function mount($id)
    {
        $this->package_types=package_types::findOrFail($id);
        $this->title=$this->package_types->title;
        $this->contents=$this->package_types->contents;
        $this->meta_title=$this->package_types->meta_title;
        $this->meta_description=$this->package_types->meta_description;
        $this->meta_keywords=$this->package_types->meta_keywords;
    }

    public function updatePackage($id){
        $this->package_types=package_types::where('id',$id)->update([
            'title'=>$this->title,
            'content'=>$this->contents,
            'meta_title'=>$this->meta_title,
            'meta_description'=>$this->meta_description,
            'meta_keywords'=>$this->meta_keywords,
        ]);
        $this->mount($id);

        //alert
    }

    public function render()
    {
        return view('livewire.admin.manage-packages.package-types.edit')->extends('admin.layouts.main');
    }
}
