<?php

namespace App\Http\Controllers;
use App\Post;
use App\Like;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserPostController extends Controller
{
    public function index(Post $post)
    {
        return view('user.post',compact('post'));
    }

    public function show($id)
    {
        
    }
    public function likePost(Request $request)
    {
        $post_id = $request['post_id'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($id);
        if (!$post) {
            return null;
        }
        $user = Sentinel::getUser()->id;
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }
}


