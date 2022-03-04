<?php

namespace App\Http\Livewire\Admin\ManageOrders;
use Livewire\Component;

class Pdf extends Component
{
    public static function loadView(string $string, array $compact)
    {
    }

    public function render()
    {
        return view('livewire.admin.manage-orders.pdf');
    }
}
