<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MailConfigController extends Controller
{
    public function index()
    {
        return view('admins.mail-config.index');
    }
}
