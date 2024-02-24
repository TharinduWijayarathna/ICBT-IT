<?php

namespace App\Http\Controllers\AdminArea;

use App\Models\Image;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends AuthController
{
    public function index()
    {
        return view('admin.pages.posts.index');
    }

    public function all(Request $request)
    {
        $response['posts'] = BlogPost::getByFilter($request->all());
        return view('admin.pages.posts.components.table', $response);
    }

    public function get($id)
    {
        $response = BlogPost::find($id);
        return $response;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $extension = $request->file('image')->extension();
        $imageName = time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('post_images'), $imageName);

        $image = Image::create([
            'path' => 'post_images/' . $imageName,
            'name' => $imageName,
            'extension' => $extension,
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::user()->id,
            'image_id' => $image->id,
        ];

        BlogPost::create($data);
        return redirect()->route('posts');
    }

    public function delete($id)
    {
        $post = BlogPost::find($id);

        $image = Image::find($post->image_id);
        if ($image) {
            $imagePath = public_path($image->path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        $post->delete();

        return true;
    }

    public function update(Request $request, $id)
    {
        $post = BlogPost::find($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = Image::find($post->image_id);
            if (isset($image)) {
                $imagePath = public_path($image->path);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }

            $extension = $request->file('image')->extension();
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('post_images'), $imageName);

            $image = Image::create([
                'path' => 'post_images/' . $imageName,
                'name' => $imageName,
                'extension' => $extension,
            ]);

            $data['image_id'] = $image->id;
        }

        $post->update($data);
        return redirect()->route('posts');
    }
}
