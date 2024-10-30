<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    ];
}
