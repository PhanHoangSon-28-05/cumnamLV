<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id_cate',
        'name',
        'slug',
        'from',
        'fromOLD',
        'promotion',
        'description',
        'about',
        'details',
        'materials_care',
        'pic'
    ];

    // public function cates(): HasMany
    // {
    //     return $this->hasMany(Category::class, 'id');
    // }

    public function cate(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'id_cate');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ImageProducts::class, 'product_id');
    }

    public function item(): HasMany
    {
        return $this->HasMany(ProductItems::class, 'id_product');
    }
}
