<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProducts extends Model
{
    use HasFactory;

    protected $table = 'image_products';
    protected $fillable = [
        'product_id',
        'image',
    ];
}
