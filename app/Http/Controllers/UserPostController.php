<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index()
    {
        return view('user.post');
    }
}
