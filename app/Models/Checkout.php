<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    const INDEX = "checkout.index";

    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'address',
        'payment_method',
        'total_price',
        'status',
    ];

    public function checkout_products() {
        return $this->hasMany(CheckoutProduct::class, 'checkout_id');
    }
}
