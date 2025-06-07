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
        $url = $request->url;
        $path = 'app/public/' . $url;

        if (is_file(storage_path($path))) {
            $file = storage_path($path);
        } else {
            $file = public_path('images/placeholder/placeholder.png');
        }

        return response()->file($file);
    }

    public function uploadImage(Request $request)
    {
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $new_name = time().'-'.$filename;
        $imgpath = $file->storeAs('uploads', $new_name, 'public');
        return response()->json(['location' => '/storage/'.$imgpath]);
    }
}
