<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $table = 'footers';

    protected $fillable = [
        'title1',
        'content11',
        'content12',
        'content13',
        'content14',
        'title2',
        'content21',
        'content22',
        'content23',
        'title3',
        'content31',
    ];
}
