<?php

namespace App\Http\Livewire\Admin\Reviews;

use App\reviews;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $image,$title,$input;

    public function addNewReview()
    {
        $this->input['title']=$this->title;

        if (isset($this->image)) {
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/reviews', 'customImageUpload');

            $this->input['image']=$this->image->hashName();
        }
        reviews::create($this->input);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "New review added successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.reviews.create')->extends('admin.layouts.main');
    }
}
