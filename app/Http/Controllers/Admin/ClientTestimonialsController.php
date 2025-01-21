<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientTestimonialsController extends Controller
{
    public function index()
    {
        return view('admins.client.index');
    }
}
