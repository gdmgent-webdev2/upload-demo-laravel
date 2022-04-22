<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $r) {
        
        return response()->json([
            'file' => $r->file
        ]);
    }
}
