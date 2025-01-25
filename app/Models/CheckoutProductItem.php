<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckoutProductItem extends Model
{
    protected $fillable = [
        'checkout_product_id',
        'product_item_id',
    ];

    public function checkout_product() {
        return $this->belongsTo(CheckoutProduct::class, 'checkout_product_id');
    }

    public function product_item() {
        return $this->belongsTo(ProductItem::class, 'product_item_id');
    }
}
