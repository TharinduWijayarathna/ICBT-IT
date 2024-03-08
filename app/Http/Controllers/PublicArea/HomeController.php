<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.pages.home.index');
    }

    public function societyMembers()
    {
        return view('public.pages.home.members');
    }

    public function societyEvents()
    {
        return view('public.pages.home.events');
    }

    public function societyBlogs()
    {
        return view('public.pages.home.blogs');
    }
}
