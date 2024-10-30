<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    const INDEX = 'colors.index';

    protected $table = 'colors';

    protected $fillable = [
        'name',
        'code_color',
    ];
}
