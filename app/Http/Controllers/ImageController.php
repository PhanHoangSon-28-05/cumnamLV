<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function __construct() {}

    public function getImage(Request $request)
    {
        dd($request);
        $url = $request->url;
        return response()->file(storage_path($url));
    }
}