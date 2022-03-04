<?php

namespace App\Http\Livewire\Admin\Contents;

use App\content;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $content;
    public $image;
    public $content_id;
    public $title,$contents,$meta_title,$meta_description,$meta_keywords;

    protected $rules = [
        'title' => 'required|min:2',
        'contents' => 'required|min:5',
    ];

    public function mount($id)
    {
        $this->content_id=$id;
        $this->content=content::findOrFail($id);
        $this->title=$this->content->title;
        $this->contents=$this->content->content;
        $this->meta_title=$this->content->meta_title;
        $this->meta_description=$this->content->meta_description;
        $this->meta_keywords=$this->content->meta_keywords;
    }

    public function updateContentData()
    {
        $this->validate();

//        if ($this->image !== ''){
//            $this->image->storeAs('public/img/content',$this->image->getFileName());
//        }
        content::where('id',$this->content_id)->update([
            'title'=>$this->title,
            'content'=>$this->contents,
            'meta_title'=>$this->meta_title,
            'meta_description'=>$this->meta_description,
            'meta_keywords'=>$this->meta_keywords,
        ]);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Coupon added successfully!"
        ]);

    }

    public function render()
    {
        return view('livewire.admin.contents.edit',[
            'content'=>$this->content
        ])->extends('admin.layouts.main');
    }
}
