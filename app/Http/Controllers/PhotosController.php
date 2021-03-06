<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;

class PhotosController extends Controller
{
    const PHOTO_STORAGE = '/imgs';

    public function index()
    {
    	$photos = Photo::all();
    	return view('photos.index', ['photos' => $photos]);
    }

    public function create(Request $request)
    {
    	$file = $request->file('photo');
        $path = $file->store(self::PHOTO_STORAGE);

        Photo::create(['path' => $path]);
        return redirect(route('photos'));
    }
}
