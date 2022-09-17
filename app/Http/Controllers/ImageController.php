<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Bras-droit')
            return view('images.index');
        else
            return redirect('dashboard')->with('status', 'Unauthorize');
    }
    public function show()
    {
        Log::log('====================================================================================');
        Log::debug('====================================================================================');
        Log::single('Chut');
        return Image::latest()->pluck('name')->toArray();
        
    }
    public function store(Request $request)
    {
        // validate the incoming file
        if (!$request->hasFile('image')) {
            return response()->json(['error' => 'There is no image present.'], 400);
        }

        $request->validate([
            'image' => 'required|file|image|mimes:jpg,jpeg,png'
        ]);

        // save the file in storage
        $path = $request->file('image')->store('images');

        if (!$path) {
            return response()->json(['error' => 'The file could not be saved.'], 500);
        }

        $uploadedFile = $request->file('image');

        // create image model
        $image = Image::create([
            'name' => $uploadedFile->hashName(),
            'extension' => $uploadedFile->extension(),
            'size' => $uploadedFile->getSize()
        ]);

        // return that image model back to the frontend
        return $image->name;
    }
    public function delete(Request $request)
    {
        // save the file in storage
        $path = $request->file('image')->store('images');

        if (!$path) {
            return response()->json(['error' => 'The file could not be remove.'], 500);
        }
        Log::info('====================================================================================');
        Log::info($path);
        $image = Storage::delete($path);

        return $image;
    }
}
