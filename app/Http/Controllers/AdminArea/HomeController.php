<?php

namespace App\Http\Controllers\AdminArea;

class HomeController extends AuthController
{
    public function index()
    {
      

        return view('admin.home.index');
    }
}
