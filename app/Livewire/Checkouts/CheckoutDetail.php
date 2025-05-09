<?php

namespace App\Livewire\Checkouts;

use Livewire\Component;
use App\Livewire\Checkouts\CheckoutList;
use App\Repositories\Checkouts\CheckoutRepositoryInterface;

class CheckoutDetail extends Component
{
    protected $checkoutRepo;

    public $checkout;
    public $view;

    public function boot(CheckoutRepositoryInterface $checkoutRepo) {
        $this->checkoutRepo = $checkoutRepo;
    }

    public function mount($view = 1) {
        $this->view = [
            1 => 'admins.checkouts.livewire.checkout-detail',
            2 => 'client.livewire.my-checkout-detail',
        ][$view];
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
        return view($this->view);
    }
}
