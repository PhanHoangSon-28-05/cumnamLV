<?php

namespace App\Repositories\CheckoutProductItems;

use App\Models\CheckoutProductItem;
use App\Repositories\BaseRepository;

class CheckoutProductItemRepository extends BaseRepository implements CheckoutProductItemRepositoryInterface
{
    public function getModel() {
        return CheckoutProductItem::class;
    }
}