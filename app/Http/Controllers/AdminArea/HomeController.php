<?php

namespace App\Http\Controllers\AdminArea;

use App\Models\BlogPost;
use App\Models\Event;
use App\Models\Member;
use App\Models\User;

class HomeController extends AuthController
{
    public function index()
    {
        $response['total_users'] = User::count();
        $response['total_members'] = Member::count();
        $response['total_blogs'] = BlogPost::count();
        $response['total_events'] = Event::count();
        return view('admin.pages.home.index')->with($response);
    }
}
