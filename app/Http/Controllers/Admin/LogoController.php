<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function index()
    {
        return view('admins.logos.index');
    }
}
