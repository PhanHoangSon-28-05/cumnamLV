<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductItems extends Model
{
    use HasFactory;

    protected $table = 'product_items';

    protected $fillable = [
        'id_product',
        'id_color',
        'id_item',
        'image',
        'fabriccolor',
        'name',
        'priceNew',
        'priceOld',
    ];

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class, 'id_color');
    }
}
