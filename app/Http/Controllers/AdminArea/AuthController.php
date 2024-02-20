<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
}
