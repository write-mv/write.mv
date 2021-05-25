<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class PostController extends Controller
{
    public function index($name)
    {
        $blog = Blog::withoutGlobalScopes()
            ->with('theme')
            ->where('name', $name)
            ->firstOrFail();

        $blog->RecordView();

        $posts = $blog->posts()->withoutGlobalScopes()->live()->latest('published_date')->simplePaginate(8);

        //Checking the theme dir
        if ($blog->theme) {
            $themeDir =  "themes::{$blog->theme->name}._list";
        } else {
            $themeDir =  "themes::default._list";
        }

        $this->buildBlogSeo($blog);

        return view($themeDir, [
            'blog' => $blog,
            'posts' => $posts
        ]);
    }

    public function show($name, $post)
    {
        $blog = Blog::withoutGlobalScopes()
            ->with('theme')
            ->where('name', $name)
            ->firstOrFail();

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

    protected function buildBlogSeo(Blog $blog)
    {
        seo()->csrfToken()
            ->title($blog->name . " - Write.mv")
            ->description($blog->description)
            ->twitter('card', 'summary_large_image')
            ->twitter('image', isset($blog->meta['og_image']) ? url($blog->meta['og_image'])  : "https://write.mv/images/opengraph.png")
            ->og('site_name', $blog->name)
            ->og('url', route('posts.index', $blog->name))
            ->og('type', 'website')
            ->og('image', isset($blog->meta['og_image']) ? url($blog->meta['og_image'])  : "https://write.mv/images/opengraph.png");
    }
}
