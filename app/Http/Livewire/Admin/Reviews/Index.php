<?php

namespace App\Http\Livewire\Admin\Reviews;

use App\reviews;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Index extends Component
{
    public $reviews;

    public function mount()
    {
        $this->reviews = reviews::orderBy('id', 'DESC')->get();
    }

    public function deleteReview($id)
    {
        $reviews = reviews::find($id);
        File::delete(public_path() . '/img/reviews/' . $reviews['image']);
        $reviews->delete();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Review deleted successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.reviews.index')->extends('admin.layouts.main');
    }
}
