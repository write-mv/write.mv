<?php

use App\Http\Livewire\CustomizeBlog;
use App\Http\Livewire\Insights;
use App\Http\Livewire\ListPosts;
use App\Http\Livewire\NewPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'blog' => Blog::first(),
        'total_post_count' => Post::count(),
        'published_post_count' => Post::live()->count(),
        'scheduled_post_count' => Post::scheduled()->count()
    ]);
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/posts',ListPosts::class)->name('posts');
    Route::get('/posts/new',NewPost::class)->name('posts.new');
    Route::get('/insights',Insights::class)->name('insights');
    Route::get('/blog/{blog}/customize',CustomizeBlog::class)->name('blog.customize');
});

require __DIR__.'/auth.php';
