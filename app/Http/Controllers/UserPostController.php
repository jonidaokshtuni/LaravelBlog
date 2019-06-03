<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(Post $post)
    {
        return view('user.post',compact('post'));
    }

    public function show($id)
    {
        
    }
}
