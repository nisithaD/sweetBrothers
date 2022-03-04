<?php

namespace App\Http\Livewire\Admin\FeaturedPages;

use App\featured_pages;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Index extends Component
{
    public $featured_pages;

    public function mount()
    {
        $this->featured_pages=featured_pages::orderBy('id', 'asc')->get();
    }
    public function toggleReview($featured_page_id)
    {
        $featured_page=featured_pages::where('id',$featured_page_id)->first();

        featured_pages::where('id',$featured_page_id)->update([
            'reviews'=>!$featured_page->reviews
        ]);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Review toggle successfully!"
        ]);
    }

    public function deleteFeaturedPages($id)
    {
        $featured_pages = featured_pages::find($id);
        File::delete(public_path() . '/img/featured_pages/' . $featured_pages['image']);
        $featured_pages->delete();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Featured page deleted successfully!"
        ]);

        $this->mount();
    }

    public function toggleFaqs($featured_page_id)
    {
        $featured_page=featured_pages::where('id',$featured_page_id)->first();

        featured_pages::where('id',$featured_page_id)->update([
            'faqs'=>!$featured_page->faqs
        ]);


        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "FAQs toggle successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.featured-pages.index')->extends('admin.layouts.main');
    }
}
