<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('images.index', compact('images'));
    }

    public function create()
    {
        return view('images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'tag' => 'required',
            'image' => 'required|image',
            'description' => 'nullable'
        ]);

        $path = $request->file('image')->store('images', 'public');

        Image::create([
            'title' => $request->title,
            'tag' => $request->tag,
            'image_url' => $path,
            'description' => $request->description,
        ]);

        return redirect()->route('images.index');
    }

    public function show(Image $image)
    {
        return view('images.show', compact('image'));
    }

    public function edit(Image $image)
    {
        return view('images.edit', compact('image'));
    }

    public function update(Request $request, Image $image)
    {
        $request->validate([
            'title' => 'required',
            'tag' => 'required',
            'image' => 'nullable|image',
            'description' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $image->update(['image_url' => $path]);
        }

        $image->update($request->except('image'));

        return redirect()->route('images.index');
    }

    public function destroy(Image $image)
    {
        $image->delete();
        return redirect()->route('images.index');
    }
}
