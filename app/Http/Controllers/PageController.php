<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($name, $page)
    {
        $blog = Blog::withoutGlobalScopes()
            ->with('theme')
            ->where('name', $name)
            ->firstOrFail();

        $page = $blog->pages()->withoutGlobalScopes()->live()->where('slug', $page)->firstOrFail();
        $page->RecordView();


        //Checking the theme dir
        if ($blog->theme) {
            $themeDir =  "themes::{$blog->theme->name}._page";
        } else {
            $themeDir =  "themes::default._page";
        }


        return view($themeDir, [
            'blog' => $blog,
            'page' => $page
        ]);
    }
}
