<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use App\Scopes\TeamScope;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExploreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $posts = Post::withoutGlobalScopes()->live()->with([
            'blog' => fn($query) => $query->withoutGlobalScope(TeamScope::class),
        ])->latest('published_date')->paginate(16);

        return view('pages.explore.overview', [
            'posts' => $posts,
            'blogs' => Blog::withoutGlobalScopes()->orderByViews()->withCount(['posts as posts_count' => function ($query) {
                $query->withoutGlobalScopes();
            }])->limit(10)->get(),
        ]);
    }
}
