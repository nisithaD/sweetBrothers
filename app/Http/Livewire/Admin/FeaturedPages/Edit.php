<?php

namespace App\Http\Livewire\Admin\FeaturedPages;

use App\featured_pages;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $featured_pages,$image,$imageName;
    public $title,$content,$link,$meta_title,$meta_description,$meta_keywords;

    public function mount($id)
    {
        $this->featured_pages=featured_pages::findOrFail($id);

        $this->title=$this->featured_pages->title;
        $this->link=$this->featured_pages->link;
        $this->imageName=$this->featured_pages->image;
        $this->content=$this->featured_pages->content;
        $this->meta_title=$this->featured_pages->meta_title;
        $this->meta_description=$this->featured_pages->meta_description;
        $this->meta_keywords=$this->featured_pages->meta_keywords;
    }

    public function editFeaturedPage($id)
    {
        if(isset($this->image)) {
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/featured_pages', 'customImageUpload');
            $this->imageName=$this->image->hashName();
        }

        featured_pages::where('id',$id)->update([
            'title'=>$this->title,
            'link'=>$this->link,
            'content'=>$this->content,
            'image'=>$this->imageName,
            'meta_title'=>$this->meta_title,
            'meta_description'=>$this->meta_description,
            'meta_keywords'=>$this->meta_keywords
        ]);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Featured page edited successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.featured-pages.edit')->extends('admin.layouts.main');
    }
}
