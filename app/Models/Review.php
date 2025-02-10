<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = [
        'star',
        'name',
        'email',
        'product_id',
        'content',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ReviewImage::class, 'review_id');
    }
}
