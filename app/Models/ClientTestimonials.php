<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTestimonials extends Model
{
    use HasFactory;

    const INDEX = 'client.index';

    protected $table = 'client_testimonials';

    protected $fillable = [
        'stt',
        'title',
        'description',
        'pic'
    ];
}
