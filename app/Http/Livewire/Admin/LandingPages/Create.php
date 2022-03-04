<?php

namespace App\Http\Livewire\Admin\LandingPages;

use App\landing_pages;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    public $image;
    public $title,$contents,$meta_title,$meta_description,$meta_keywords,$page_url;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|min:2',
        'page_url' => 'required|min:5',
    ];

    public function createNewPage()
    {
        $this->validate();

        landing_pages::create([
            'title'=>$this->title,
            'link'=>$this->page_url,
            'content'=>$this->contents,
            'meta_title'=>$this->meta_title,
            'meta_description'=>$this->meta_description,
            'meta_keywords'=>$this->meta_keywords,
        ]);

        //image uploader
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.landing-pages.create')->extends('admin.layouts.main');;
    }
}
