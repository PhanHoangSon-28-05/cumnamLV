<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    use HasFactory;

    const INDEX = 'pages.index';

    protected $table = 'pages';

    protected $fillable = [
        'id_cate',
        'description',
        'paragraph1',
        'paragraph2',
        'paragraph3',
    ];

    public function cate(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'id_cate');
    }
}
