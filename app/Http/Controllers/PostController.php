<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Blog;
use Illuminate\Http\Request;
use romanzipp\Seo\Structs\Meta;

class PostController extends Controller
{
    public function index($name)
    {
        $blog = Blog::withoutGlobalScopes()
            ->with('theme')
            ->where('name', $name)
            ->firstOrFail();

        $blog->RecordView();

        $posts = $blog->posts()->withoutGlobalScopes()->live()->latest('published_date')->whereNotIn('display_name', ['anonymous'])->simplePaginate(8);

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

        $post = $blog->posts()->withoutGlobalScopes()->with('tags')->live()->where('slug', $post)->firstOrFail();

        if ($post->display_name == 'anonymous') {
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

        $this->buildPostSeo($post, $blog);


        return view($themeDir, [
            'blog' => $blog,
            'post' => $post,
            //'comments' => $comments
        ]);
    }

    protected function buildPostSeo(Post $post, Blog $blog)
    {
        seo()->csrfToken()
            ->title($post->title . " - Write.mv")
            ->description($post->excerpt)
            ->twitter('card', 'summary_large_image')
            ->twitter('image', url("/storage/" . $post->featured_image))
            ->og('site_name', $blog->name)
            ->og('url', route('domain.posts.show', ["name" => $blog->name, "post" => $post->slug]))
            ->og('type', 'website')
            ->og('image', url("/storage/" . $post->featured_image))
            ->add(
                Meta::make()
                    ->attr('data-rh', 'true')
                    ->attr('property', 'al:android:app_name')
                    ->attr('content', 'Medium')
            )->add(
                Meta::make()
                    ->attr('property', 'article:published_time')
            );
    }

    protected function buildBlogSeo(Blog $blog)
    {
        seo()->csrfToken()
            ->title($blog->name . " - Write.mv")
            ->description($blog->description)
            ->twitter('card', 'summary_large_image')
            ->twitter('image', isset($blog->meta['og_image']) ? url('/storage' . $blog->meta['og_image'])  : "https://write.mv/images/opengraph.png")
            ->og('site_name', $blog->name)
            ->og('url', route('domain.posts.index', $blog->name))
            ->og('type', 'website')
            ->og('image', isset($blog->meta['og_image']) ? url('/storage' . $blog->meta['og_image'])  : "https://write.mv/images/opengraph.png");
    }
}
