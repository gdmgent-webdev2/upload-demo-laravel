<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function show() {

        Storage::disk('public')->put('example.txt', 'Hello NMD2');

        return view('upload');
    }
 
    public function store(Request $r) { 

        $r->validate([
            'file' => 'file|required|max:1000|mimes:png,jpg,gif,bmp'
        ]);

        dd($r->file->getClientOriginalExtension());

        $fileSystem = Storage::disk('public');
        $randomName = date('d') . '-' . Str::random(10) . ''; // todo: add extension at the end;


        dd($r->file);
    }
}
