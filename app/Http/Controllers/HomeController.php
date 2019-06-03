<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status',1)->paginate(2);
        return view('user.blog',compact('posts'));
    }
}
