<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {
        return view('admins.header.index');
    }
}
