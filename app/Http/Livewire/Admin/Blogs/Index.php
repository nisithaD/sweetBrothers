<?php

namespace App\Http\Livewire\Admin\Blogs;

use App\blogs;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Index extends Component
{
    public $blogs;

    public function mount()
    {
        $this->blogs = blogs::orderBy('id', 'DESC')->get();
    }

    public function deleteBlog($id){
        $blogs = blogs::find($id);
        File::delete(public_path() . '/img/blogs/' . $blogs['image']);
        $blogs->delete();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Blog deleted successfully!"
        ]);

        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin.blogs.index')->extends('admin.layouts.main');
    }
}
