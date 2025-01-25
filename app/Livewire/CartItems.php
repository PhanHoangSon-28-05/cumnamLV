<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Session;

class CartItems extends Component
{
    #[Session(key: 'shopping-cart')] 
    public $cart_items;

    public $logo;

    public function mount($logo)
    {
        $this->logo = $logo;
    }

    public function removeItem($key)
    {
        unset($this->cart_items[$key]);
    }

    public function render()
    {
        return view('client.livewire.cart-items');
    }
}
