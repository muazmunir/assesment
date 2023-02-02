<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImagesController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('images.index',compact('images'));
    }

    public function create()
    {
        return view('images.create');
    }

    public function store(Request $request)
    {
        $image = $request->file('file');
        $FileName = $image->getClientOriginalName();
        $image->move(public_path('uploads/images'), $FileName);
        
        $imageUpload = new Image();
        $imageUpload->name = 'uploads/images/'.$FileName;
        $imageUpload->save();
        return response()->json(['success' => $FileName]);
    }
}
