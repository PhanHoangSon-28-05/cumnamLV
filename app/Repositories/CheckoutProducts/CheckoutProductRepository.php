<?php

namespace App\Repositories\CheckoutProducts;

use App\Models\CheckoutProduct;
use App\Repositories\BaseRepository;

class CheckoutProductRepository extends BaseRepository implements CheckoutProductRepositoryInterface
{
    public function getModel() {
        return CheckoutProduct::class;
    }
}