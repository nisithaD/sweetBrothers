<?php

namespace App\Http\Livewire\Admin\ManageSalesProducts\Products;

use App\categories;
use App\product_types;
use App\products;
use App\subcats;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Index extends Component
{
    public $products,$types,$cats,$subcats;

    public function mount()
    {
        $this->products = products::where('sales', '1')->orderBy('title', 'asc')->get();
        $this->types = product_types::where('sales', '1')->orderBy('id', 'asc')->get();
        $this->cats = categories::where('sales', '1')->orderBy('id', 'asc')->get();
        $this->subcats = subcats::where('sales', '1')->orderBy('id', 'asc')->get();
    }

    public function deleteProduct($id)
    {
        $products=products::find($id);
        File::delete(public_path() . '/img/products/' . $products['image']);
        $products->delete();

        $this->mount();
        //alert
    }

    public function render()
    {
        return view('livewire.admin.manage-sales-products.products.index')->extends('admin.layouts.main');
    }
}
