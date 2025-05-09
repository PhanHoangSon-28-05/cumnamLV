<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckoutProductItem extends Model
{
    protected $guarded = ['id'];

    public function checkout_product() {
        return $this->belongsTo(CheckoutProduct::class, 'checkout_product_id');
    }

    public function product_item() {
        return $this->belongsTo(ProductItems::class, 'product_item_id');
    }
}
