<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    const INDEX = "category.index";

    protected $table = 'categories';

    protected $fillable = [
        'stt',
        'parent_id',
        'name',
        'slug',
        'description',
        'content',
        'image',
        'post',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'id_cate');
    }
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
