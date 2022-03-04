<?php

namespace App\Http\Livewire\Admin\LandingPages;

use App\landing_pages;
use Livewire\Component;

class Index extends Component
{
    public $landing_pages;

    public function toggleReview($id)
    {
        $featured_page=landing_pages::where('id',$id)->first();

        landing_pages::where('id',$id)->update([
            'reviews'=>!$featured_page->reviews
        ]);

        //alert
    }

    public function toggleFaqs($id)
    {
        $featured_page=landing_pages::where('id',$id)->first();

        landing_pages::where('id',$id)->update([
            'faqs'=>!$featured_page->faqs
        ]);

        //alert
    }

    public function deletePage($id)
    {
        $landing_pages = landing_pages::find($id);
//        $this->imagedelete($landing_pages['image'], 'landing_pages');
        $landing_pages->delete();

        $this->mount();
    }

    public function mount()
    {
        $this->landing_pages = landing_pages::orderBy('id', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.admin.landing-pages.index')->extends('admin.layouts.main');
    }
}
