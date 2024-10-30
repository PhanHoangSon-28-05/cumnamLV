<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItems extends Model
{
    use HasFactory;

    protected $table = 'product_items';

    protected $fillable = [
        'id_product',
        'id_color',
        'id_item',
        'image',
        'name',
        'priceNew',
        'priceOld',
    ];
}
