<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagePage extends Model
{
    use HasFactory;

    protected $table = 'image_pages';
    protected $fillable = [
        'page_id',
        'image',
    ];
}
