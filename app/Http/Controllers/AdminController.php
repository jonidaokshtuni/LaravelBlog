<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function editing()
    {
        return view('admin.dashboard');
    }
}
