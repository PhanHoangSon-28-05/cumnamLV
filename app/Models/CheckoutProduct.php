<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckoutProduct extends Model
{
    protected $fillable = [
        'checkout_id',
        'product_id',
        'width',
        'height',
        'price',
        'amount',
        'total_price',
    ];

    public function checkout() {
        return $this->belongsTo(Checkout::class, 'checkout_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function checkout_product_items() {
        return $this->hasMany(CheckoutProductItem::class, 'checkout_product_id');
    }

    public function product_items() {
        return $this->belongsToMany(ProductItems::class, 'checkout_product_items', 'checkout_product_id', 'product_item_id');
    }
}
