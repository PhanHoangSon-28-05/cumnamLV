<?php

namespace App\Livewire\Orders;

use App\Models\OrderItem;
use Livewire\Component;

class OrderList extends Component
{
    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        $orders = OrderItem::all();
        return view(
            'admins.order-item.livewire.order-list',
            ['orders' => $orders]
        );
    }
}
