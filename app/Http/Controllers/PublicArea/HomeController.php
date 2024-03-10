<?php

namespace App\Http\Controllers\PublicArea;

use App\Models\Event;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index()
    {
        $response['events'] = Event::orderBy('id', 'desc')->limit(3)->get();
        return view('public.pages.home.index')->with($response);
    }

    public function societyMembers()
    {
        $response['members'] = Member::all();
        return view('public.pages.home.members')->with($response);
    }

    public function societyEvents()
    {
        $response['events'] = Event::all();
        return view('public.pages.home.events')->with($response);
    }

    public function societyBlogs()
    {
        $response['blogs'] = BlogPost::all();
        return view('public.pages.home.blogs')->with($response);
    }
}
