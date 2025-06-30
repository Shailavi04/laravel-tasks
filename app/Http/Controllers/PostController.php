<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
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
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $manager = new ImageManager(new Driver());
            $resized = $manager->read($image->getPathname())
                               ->cover(150, 150)
                               ->toJpeg();
file_put_contents(public_path("profile_images/{$filename}"), (string) $resized);
$imagePath = "profile_images/{$filename}";

        }

        Post::create([
            'title' => ['en' => $request->title_en, 'hi' => $request->title_hi],
            'description' => ['en' => $request->description_en, 'hi' => $request->description_hi],
            'image_path' => $imagePath,
        ]);

        return redirect('/posts')->with('success', 'Post created successfully!');
    }
}
