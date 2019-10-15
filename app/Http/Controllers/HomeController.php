<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use App\User;
use Notification;
use App\Notifications\TaskCompleted;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status',1)->paginate(2);
        return view('user.blog',compact('posts'));
    }
    public function sendNotification()
    {
        $user = User::first();
        Notification::send($user, new TaskCompleted());
   
    }
}
