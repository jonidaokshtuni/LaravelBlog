<?php

namespace App\Http\View\Composers;

use App\Post;
use Illuminate\View\View;

class PostComposer
{
    protected $posts;

    public function __construct(Post $posts)
    {
      
        $this->posts = $posts;
    }

   

    public function compose(View $view)
    {
        $view->with('postsCount', $this->posts);
    }

}