<?php

namespace App\Http\Livewire\Admin\FeaturedPages;

use App\featured_pages;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $input, $image;

    public function createNewFeaturedPage()
    {
        if (isset($this->image)) {
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/featured_pages', 'customImageUpload');

            $this->input['image']=$this->image->hashName();
        }

        featured_pages::create($this->input);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Featured page added successfully!"
        ]);

        $this->input="";
    }

    public function render()
    {
        return view('livewire.admin.featured-pages.create')->extends('admin.layouts.main');
    }
}
