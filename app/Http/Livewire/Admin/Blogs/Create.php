<?php

namespace App\Http\Livewire\Admin\Blogs;

use App\blogs;
use App\years;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $input, $image;

    protected $rules = [
        "input.title" => "required"
    ];

    public function createNewBlog()
    {
        $year = date("Y");
        $this->input['year'] = $year;

        if (isset($this->image)) {
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            $this->image->store('/blogs', 'customImageUpload');

            $this->input['image']=$this->image->hashName();
        }

//        $get_year = years::where('title', $this->input['year'])->first();
//
//        if($get_year == null) {
//            $new_year = new years;
//            $new_year->title = $year;
//            $new_year->save();
//        }

        blogs::create($this->input);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "New blog created successfully!"
        ]);

        $this->input="";

    }

    public function render()
    {
        return view('livewire.admin.blogs.create')->extends('admin.layouts.main');
    }
}
