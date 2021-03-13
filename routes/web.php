<?php

use App\Http\Controllers\PostController;
use App\Http\Livewire\CustomizeBlog;
use App\Http\Livewire\Insights;
use App\Http\Livewire\ListPosts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Post as PostModel;
use App\Http\Livewire\Post;

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

Route::get('/explore', function () {
    return view('coming-soon');
});

Route::get('/screencasts', function () {
    return view('coming-soon');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'blog' => Blog::first(),
        'total_post_count' => PostModel::count(),
        'published_post_count' => PostModel::live()->count(),
        'scheduled_post_count' => PostModel::scheduled()->count()
    ]);
})->middleware(['auth'])->name('dashboard');



Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {
    Route::get('/posts', ListPosts::class)->name('posts');
    Route::get('/posts/new', Post::class)->name('posts.new');
    Route::get('/posts/e/{post}', Post::class)->name('posts.update');
    Route::get('/insights', Insights::class)->name('insights');
    Route::get('/blog/{blog}/customize', CustomizeBlog::class)->name('blog.customize');
});

require __DIR__ . '/auth.php';

//blog
Route::get('/{name}', [PostController::class, 'index'])->name('posts.index');
Route::get('/{name}/{post}', [PostController::class, 'show'])->name('posts.show');
