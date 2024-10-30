<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    const INDEX = 'orderitems.index';

    protected $table = 'order_items';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
    ];
}
