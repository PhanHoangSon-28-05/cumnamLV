<?php

namespace App\Livewire\Checkouts;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Checkouts\CheckoutRepositoryInterface;

class CheckoutList extends Component
{
    use WithPagination;

    protected $checkoutRepo;

    public $paginate = 10;

    protected $listeners = ['refresh' => '$refresh'];

    public function boot(CheckoutRepositoryInterface $checkoutRepo) 
    {
        $this->checkoutRepo = $checkoutRepo;
    }

    public function render()
    {
        $checkouts = $this->checkoutRepo->getAll()->sortBy('status')->paginate($this->paginate);

        return view('admins.checkouts.livewire.checkout-list')->with([
            'checkouts' => $checkouts,
        ]);
    }
}
