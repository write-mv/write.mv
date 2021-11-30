<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PreviewAnonymousPosts extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(int $post)
    {
        $post = Post::withoutGlobalScopes()->findOrFail($post);

        $post->blog->RecordView();

        $post->RecordView();

        //Checking the theme dir
        if ($post->blog->theme) {
            $themeDir =  "themes::{$post->blog->theme->name}._post";
        } else {
            $themeDir =  "themes::default._post";
        }

        return view($themeDir, [
            'blog' => $post->blog,
            'post' => $post
        ]);
    }
}
