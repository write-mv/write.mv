<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tag;

class TagController extends Controller
{
    public function index($name)
    {
        $blog = Blog::withoutGlobalScopes()
            ->with('theme')
            ->where('name', $name)
            ->firstOrFail();

        $tags = $blog->tags()->orderBy('name')->get()->groupBy(function ($tag) {
            return substr($tag->name, 0, 1);
        });

        //Checking the theme dir
        if ($blog->theme) {
            $themeDir =  "themes::{$blog->theme->name}._tags";
        } else {
            $themeDir =  "themes::default._tags";
        }

        $this->buildBlogSeo($blog);

        return view($themeDir, [
            'blog' => $blog,
            'tags' => $tags
        ]);
    }

    protected function buildTagSeo(Tag $tag)
    {
        seo()->csrfToken()
            ->title($tag->name . " - Write.mv");
    }

    protected function buildBlogSeo(Blog $blog)
    {
        seo()->csrfToken()
            ->title($blog->name . " tags - Write.mv")
            ->description($blog->description)
            ->twitter('card', 'summary_large_image')
            ->twitter('image', isset($blog->meta['og_image']) ? url('/storage' . $blog->meta['og_image'])  : "https://write.mv/images/opengraph.png")
            ->og('site_name', $blog->name)
            ->og('url', route('domain.posts.index', $blog->name))
            ->og('type', 'website')
            ->og('image', isset($blog->meta['og_image']) ? url('/storage' . $blog->meta['og_image'])  : "https://write.mv/images/opengraph.png");
    }
}
