<?php

namespace App\Http\Livewire\Admin\LandingPages;

use App\landing_pages;
use Livewire\Component;

class Edit extends Component
{
    public $landing_page;
    public $image;
    public $landing_page_id;
    public $title,$contents,$meta_title,$meta_description,$meta_keywords,$page_url;


    public function mount($id)
    {
        $this->landing_page_id=$id;
        $this->landing_page=landing_pages::findOrFail($id);
        $this->title=$this->landing_page->title;
        $this->page_url=$this->landing_page->link;
        $this->contents=$this->landing_page->content;
        $this->meta_title=$this->landing_page->meta_title;
        $this->meta_description=$this->landing_page->meta_description;
        $this->meta_keywords=$this->landing_page->meta_keywords;
    }

    protected $rules = [
        'title' => 'required|min:2',
    ];

    public function updateLandingPage()
    {
        $this->validate();

//        if ($this->image !== ''){
//            $this->image->storeAs('public/img/content',$this->image->getFileName());
//        }
        landing_pages::where('id',$this->landing_page_id)->update([
            'title'=>$this->title,
            'content'=>$this->contents,
            'meta_title'=>$this->meta_title,
            'meta_description'=>$this->meta_description,
            'meta_keywords'=>$this->meta_keywords,
        ]);

        //alert
    }
    public function render()
    {
        return view('livewire.admin.landing-pages.edit')->extends('admin.layouts.main');
    }
}
