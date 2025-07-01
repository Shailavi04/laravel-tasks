<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        // ✅ Validate request fields
        $request->validate([
            'title_en' => 'required|string',
            'title_hi' => 'required|string',
            'description_en' => 'required|string',
            'description_hi' => 'required|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $filename = uniqid('profile_') . '.' . $image->getClientOriginalExtension();
            $storagePath = 'public/profile_images/' . $filename;

            $manager = new ImageManager(new Driver()); // ✅ Required in Intervention v3
            $resizedImage = $manager->read($image)->cover(150, 150); // 150x150 thumbnail

            Storage::disk('public')->put('profile_images/' . $filename, (string) $resizedImage->toJpeg());

            $imagePath = 'storage/profile_images/' . $filename;
        }
        // ✅ Save post
        Post::create([
            'title' => [
                'en' => $request->title_en,
                'hi' => $request->title_hi,
            ],
            'description' => [
                'en' => $request->description_en,
                'hi' => $request->description_hi,
            ],
            'image_path' => $imagePath,
        ]);

        return redirect('/posts')->with('success', 'Post created successfully!');
    }
}
