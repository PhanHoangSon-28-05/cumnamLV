<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteConfigController extends Controller
{
    public function index()
    {
        return view('admins.site-config.index');
    }
}
