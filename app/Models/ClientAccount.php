<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ClientAccount extends Authenticatable
{
    protected $guarded = ['id'];

    public function checkouts() {
        return $this->hasMany(Checkout::class, 'account_id');
    }
}
