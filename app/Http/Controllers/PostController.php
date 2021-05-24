<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($name)
    {
        $blog = Blog::withoutGlobalScopes()->with('theme')->where('name', $name)->first();

        if (!$blog) {
            abort(404);
        }

        $blog->RecordView();

        $posts = $blog->posts()->withoutGlobalScopes()->live()->latest('published_date')->simplePaginate(8);

        //Checking the theme dir
        if ($blog->theme) {
            $themeDir =  "themes::{$blog->theme->name}._list";
        } else {
            $themeDir =  "themes::default._list";
        }

        return view($themeDir, [
            'blog' => $blog,
            'posts' => $posts
        ]);
    }

    public function show($name, $post)
    {
        $blog = Blog::withoutGlobalScopes()->with('theme')->where('name', $name)->first();

        if (!$blog) {
            abort(404);
        }

        $post = $blog->posts()->withoutGlobalScopes()->live()->where('slug', $post)->first();

        if (!$post) {
            abort(404);
        }

        $blog->RecordView();

        $post->RecordView();

        //$comments = $post->getThreadedComments();

        //Checking the theme dir
        if ($blog->theme) {
            $themeDir =  "themes::{$blog->theme->name}._post";
        } else {
            $themeDir =  "themes::default._post";
        }


        return view($themeDir, [
            'blog' => $blog,
            'post' => $post,
            //'comments' => $comments
        ]);
    }
}
