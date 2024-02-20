<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends AuthController
{
    public function index()
    {
        $response['members'] = Member::all();

        return view('admin.members.index')->with($response);
    }

    public function create()
    {
        return view('admin.members.components.add-new-member');
    }
}
