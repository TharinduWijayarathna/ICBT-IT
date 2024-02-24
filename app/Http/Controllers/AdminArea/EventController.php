<?php

namespace App\Http\Controllers\AdminArea;

use App\Models\Event;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends AuthController
{
    public function index()
    {
        return view('admin.pages.events.index');
    }

    public function all(Request $request)
    {
        $response['events'] = Event::getByFilter($request->all());
        return view('admin.pages.events.components.table', $response);
    }

    public function get($id)
    {
        $response = Event::find($id);
        return $response;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $extension = $request->file('image')->extension();
        $imageName = time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('event_images'), $imageName);

        $image = Image::create([
            'path' => 'event_images/' . $imageName,
            'name' => $imageName,
            'extension' => $extension,
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image_id' => $image->id,
            'user_id' => Auth::user()->id,
        ];

        Event::create($data);
        return redirect()->route('events');
    }

    public function delete($id)
    {
        $event = Event::find($id);

        $image = Image::find($event->image_id);
        if ($image) {
            $imagePath = public_path($image->path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        $event->delete();

        return true;
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = Image::find($event->image_id);
            if (isset($image)) {
                $imagePath = public_path($image->path);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }

            $extension = $request->file('image')->extension();
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('event_images'), $imageName);

            $image = Image::create([
                'path' => 'event_images/' . $imageName,
                'name' => $imageName,
                'extension' => $extension,
            ]);

            $data['image_id'] = $image->id;
        }

        $event->update($data);
        return redirect()->route('events');
    }
}
