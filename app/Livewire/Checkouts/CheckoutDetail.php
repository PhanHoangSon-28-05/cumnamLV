<?php

namespace App\Livewire\Checkouts;

use Livewire\Component;
use App\Livewire\Checkouts\CheckoutList;
use App\Repositories\Checkouts\CheckoutRepositoryInterface;

class CheckoutDetail extends Component
{
    protected $checkoutRepo;

    public $checkout;

    public function boot(CheckoutRepositoryInterface $checkoutRepo) {
        $this->checkoutRepo = $checkoutRepo;
    }

    public function modalSetup($id)
    {
        $this->checkout = $this->checkoutRepo->find($id);
    }

    public function payment() 
    {
        if (!$this->checkout) return;
        $this->checkout->update(['status' => 1]);
        $this->dispatch('refresh')->to(CheckoutList::class);
    }

    public function render()
    {
        return view('admins.checkouts.livewire.checkout-detail');
    }
}
