<?php

namespace App\Http\Livewire\Admin\Reviews;

use App\reviews;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $title,$image,$reviews,$input;

    public function mount($id)
    {
        $this->reviews=reviews::findOrFail($id);
        $this->title=$this->reviews->title;
    }

    public function editReview($id)
    {
        $this->input['title']=$this->title;

        if (isset($this->image)) {
            File::delete(public_path() . '/img/reviews/' . $this->reviews['image']);

            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/reviews', 'customImageUpload');
            $this->input['image']=$this->image->hashName();
        }
        $reviews=reviews::findOrFail($id);
        $reviews->update($this->input);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Review updated successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.reviews.edit')->extends('admin.layouts.main');
    }
}
