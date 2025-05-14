<?php

// app/Http/Controllers/UploadController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/uploads', $filename);

            $url = Storage::url($path); // gives /storage/uploads/filename.ext

            return response()->json([
                'url' => $url,
            ]);
        }

        return response()->json([
            'error' => ['message' => 'No file uploaded.']
        ], 400);
    }
}
