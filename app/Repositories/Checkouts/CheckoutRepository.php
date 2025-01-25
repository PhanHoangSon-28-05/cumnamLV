<?php

namespace App\Repositories\Checkouts;

use App\Models\Checkout;
use App\Repositories\BaseRepository;

class CheckoutRepository extends BaseRepository implements CheckoutRepositoryInterface
{
    public function getModel() {
        return Checkout::class;
    }
}