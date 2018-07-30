<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function articleCover(Request $request)
    {
        $path = $request->file('articleCover')->store('article/cover');
        return $path;
    }
}
