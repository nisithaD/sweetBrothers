<?php

namespace App\Http\Livewire\Admin\Offers;

use App\offers;
use Livewire\Component;

class Edit extends Component
{
    public $title,$link,$offer;

    public function mount($id){
        $this->offer=offers::findOrFail($id);

        $this->title=$this->offer->title;
        $this->link=$this->offer->link;
    }

    public function update($id){
        offers::where('id',$id)->update([
            'title'=>$this->title,
            'link'=>$this->link,
        ]);
        $this->mount($id);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Offer updated successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.offers.edit')->extends('admin.layouts.main');
    }
}
