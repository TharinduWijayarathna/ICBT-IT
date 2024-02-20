<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends AuthController
{
    public function index()
    {
        return view('admin.pages.members.index');
    }

    public function create()
    {
        return view('admin.members.components.add-new-member');
    }
}
