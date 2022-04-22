<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function store(Request $r) {
        
        $validator = Validator::make($r->all(), [
            'file' => 'file|required|max:1000|mimes:png,jpg,gif,bmp'
        ]);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // get extension
        $ext = $r->file->getClientOriginalExtension();

        // make random file name, with day-prefix
        $randomName = date('d') . '-' . Str::random(10) . '.' . $ext;
        
        // path magic
        $filePath = 'uploads/' . date('Y/m/');
        $fullPath = $filePath . $randomName;

        // upload files in symbolic public folder (make accessable)
        /** @var Illuminate\Filesystem\FilesystemAdapter */
        $fileSystem = Storage::disk('public');
        $fileSystem->putFileAs($filePath, $r->file, $randomName);

        // add as record in database
        $fileEntity = new File();
        $fileEntity->name = $fullPath;
        $fileEntity->save();

        return response()->json([
            'message' => 'File succesfully uploaded',
            'name' => $fullPath
        ]);
    }

    public function remove(Request $r) {

        $file = File::where('name', $r->file)->first();
        
        if(!$file) {
            return;
        }

        // remove from database
        $file->delete();

        // remove from server
        $filePath = storage_path('app/public/' . $file->name);
        if(file_exists($filePath)) {
            unlink($filePath);
        }
        return response()->json([
            'message' => 'file succesfully deleted'
        ]);
    }
}
