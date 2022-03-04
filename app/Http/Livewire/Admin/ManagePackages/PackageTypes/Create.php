<?php

namespace App\Http\Livewire\Admin\ManagePackages\PackageTypes;

use App\package_types;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    public $image;
    public $title,$contents,$meta_title,$meta_description,$meta_keywords;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|min:2',
        "image" => "mimes:jpeg,png|max:20000"
    ];

    public function createNewPackageType()
    {
        $this->validate();

        if(isset($this->image)) {

            $this->validate();

            $this->validate([
                'image' => 'image|max:2048', // 2MB Max
            ]);

            $this->image->store('/package_types','customImageUpload');
        }
        package_types::create([
            'title'=>$this->title,
            'content'=>$this->contents,
            'meta_title'=>$this->meta_title,
            'meta_description'=>$this->meta_description,
            'meta_keywords'=>$this->meta_keywords,
            'image'=>$this->image->hashName()
        ]);

        //image uploader
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.manage-packages.package-types.create')->extends('admin.layouts.main');
    }
}
