<?php

namespace App\Http\Livewire\Admin\ManagePackages\Packages;

use App\package_features;
use App\package_types;
use App\packages;
use Livewire\Component;

class Edit extends Component
{

    public $types,$packages,$features;
    public $title,$type_id,$level,$price,$price_old,$content,$meta_title,$meta_description,$meta_keywords;

    public function mount($id)
    {
        $this->types = package_types::orderby('id', 'asc')->get();
        $this->packages=packages::findOrFail($id);
        $this->features = package_features::orderby('id', 'asc')->get();

        $this->title=$this->packages->title;
        $this->type_id=$this->packages->type_id;
        $this->level=$this->packages->level;
        $this->price=$this->packages->price;
        $this->price_old=$this->packages->price_old;
        $this->content=$this->packages->content;
        $this->meta_title=$this->packages->meta_title;
        $this->meta_description=$this->packages->meta_description;
        $this->meta_keywords=$this->packages->meta_keywords;
    }

    public function updatePackage($id){

        packages::where('id',$id)->update([
            'title'=>$this->title,
            'type_id'=>$this->type_id,
            'level'=>$this->level,
            'price'=>$this->price,
            'price_old'=>$this->price_old,
            'content'=>$this->content,
            'meta_title'=>$this->meta_title,
            'meta_description'=>$this->meta_description,
            'meta_keywords'=>$this->meta_keywords,

        ]);
        $this->mount($id);
        //alert
    }

    public function render()
    {
        return view('livewire.admin.manage-packages.packages.edit')->extends('admin.layouts.main');
    }
}
