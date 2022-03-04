<?php

namespace App\Http\Livewire\Admin\Blogs;

use App\blogs;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $blog;
    public $title,$contents,$image,$meta_title,$meta_description,$meta_keywords,$uploadedImage;

    public function mount($id)
    {
        $this->blog = blogs::findOrFail($id);

        $this->title=$this->blog->title;
        $this->contents=$this->blog->content;
        $this->meta_title=$this->blog->meta_title;
        $this->meta_description=$this->blog->meta_description;
        $this->meta_keywords=$this->blog->meta_keywords;
    }

    public function editBlog($id)
    {
        if (isset($this->image)) {
            $this->validate([
                'image' => 'image|max:20000', // 2MB Max
            ]);
            File::delete(public_path() . '/img/blogs/' . $this->blog['image']);
            $this->image->store('/blogs', 'customImageUpload');
            $this->uploadedImage=$this->image->hashName();
        }
        else{
            $this->uploadedImage=$this->blog->image;
        }

        $blogs=blogs::findOrFail($id)->update([
            'title'=>$this->title,
            'content'=>$this->contents,
            'image'=>$this->uploadedImage,
            'meta_title'=>$this->meta_title,
            'meta_description'=>$this->meta_description,
            'meta_keywords'=>$this->meta_keywords
        ]);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Blog updated successfully!"
        ]);

    }

    public function render()
    {
        return view('livewire.admin.blogs.edit')->extends('admin.layouts.main');
    }
}
