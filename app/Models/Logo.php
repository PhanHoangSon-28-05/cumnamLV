<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;

    const INDEX = "logos.index";

    protected $table = 'logos';

    protected $fillable = [
        'stt',
        'pic',
        'header'
    ];
}
