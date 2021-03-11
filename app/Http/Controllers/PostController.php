<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index($name)
   {

    $blog = Blog::withoutGlobalScopes()->where('name',$name)->first();

    if(!$blog) {
        abort(404);
    }

    $posts = $blog->posts()->live()->latest('published_date')->simplePaginate(8);

       return view('posts.index', [
           'blog' => $blog,
           'posts' => $posts
       ]);
   }
}
