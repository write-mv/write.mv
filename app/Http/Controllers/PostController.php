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

        $this->buildBlogSeo();

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

    protected function buildBlogSeo()
    {
        SEOTools::setTitle('Home');
        SEOTools::setDescription('This is my page description');
        SEOTools::opengraph()->setUrl('http://current.url.com');
        SEOTools::setCanonical('https://codecasts.com.br/lesson');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');
    }
}
