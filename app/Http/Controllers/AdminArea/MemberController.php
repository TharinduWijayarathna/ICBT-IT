<?php

namespace App\Http\Controllers\AdminArea;

use App\Models\Image;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends AuthController
{
    public function index()
    {
        return view('admin.pages.members.index');
    }

    public function all(Request $request)
    {
        $response['members'] = Member::getByFilter($request->all());
        return view('admin.pages.members.components.table', $response);
    }

    public function get($id)
    {
        $response = Member::find($id);
        return $response;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members,email',
            'designation' => 'required',
            'batch' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $extension = $request->file('image')->extension();
        $imageName = time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('member_images'), $imageName);

        $image = Image::create([
            'path' => 'member_images/' . $imageName,
            'name' => $imageName,
            'extension' => $extension,
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'designation' => $request->designation,
            'batch' => $request->batch,
            'image_id' => $image->id,
        ];

        Member::create($data);
        return redirect()->route('members');
    }

    public function delete($id)
    {
        $member = Member::find($id);

        $image = Image::find($member->image_id);
        if ($image) {
            $imagePath = public_path($image->path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        $member->delete();

        return true;
    }

    public function update(Request $request, $id)
    {
        $member = Member::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'designation' => 'required',
            'batch' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'designation' => $request->designation,
            'batch' => $request->batch,
        ];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = Image::find($member->image_id);
            if (isset($image)) {
                $imagePath = public_path($image->path);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }

            $extension = $request->file('image')->extension();
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('member_images'), $imageName);

            $image = Image::create([
                'path' => 'member_images/' . $imageName,
                'name' => $imageName,
                'extension' => $extension,
            ]);

            $data['image_id'] = $image->id;
        }

        $member->update($data);
        return redirect()->route('members');
    }
}
