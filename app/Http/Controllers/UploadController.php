<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function show() {
        return view('upload');
    }
 
    public function store(Request $r) { 

        $r->validate([
            'file' => 'file|required|max:1000|mimes:png,jpg,gif,bmp'
        ]);

        dd($r->file);
    }
}
