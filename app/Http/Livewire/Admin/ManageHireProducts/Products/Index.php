<?php

namespace App\Http\Livewire\Admin\ManageHireProducts\Products;

use App\categories;
use App\product_types;
use App\products;
use App\subcats;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $products,$types,$cats,$subcats;

    public function mount()
    {
        $this->products = products::where('hire', '1')->orderBy('title', 'asc')->get();
        $this->types = product_types::where('hire', '1')->orderBy('id', 'asc')->get();
        $this->cats = categories::where('hire', '1')->orderBy('id', 'asc')->get();
        $this->subcats = subcats::where('hire', '1')->orderBy('id', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.admin.manage-hire-products.products.index',['products',$this->products])->extends('admin.layouts.main');
    }
}
