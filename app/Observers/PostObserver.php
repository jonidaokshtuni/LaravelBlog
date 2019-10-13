<?php

namespace App\Observers;

use App\Post;

class PostObserver
{
    public function saving(Post $post)
    {
        $post->slug = str_slug($post->title);
    }
}
