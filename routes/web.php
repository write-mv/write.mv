<?php

use App\Http\Controllers\ChangeLogController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WhatsNewController;
use App\Http\Livewire\Account;
use App\Http\Livewire\CustomizeBlog;
use App\Http\Livewire\Insights;
use App\Http\Livewire\ListPosts;
use App\Http\Livewire\ListTags;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Post as PostModel;
use App\Http\Livewire\Post;
use App\Http\Livewire\ViewStats;

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
    return view('pages.welcome');
});

Route::get('/explore', ExploreController::class)->name('explore');

Route::get('/screencasts', function () {
    return view('coming-soon');
});

Route::get('/about', function () {
    return view('pages.about');
});


Route::get('/whats-new', WhatsNewController::class);
Route::get('/change-log', ChangeLogController::class);

Route::get('/dashboard', function () {
    return view('dashboard', [
        'blog' => Blog::first(),
        'total_post_count' => PostModel::count(),
        'published_post_count' => PostModel::live()->count(),
        'scheduled_post_count' => PostModel::scheduled()->count()
    ]);
})->middleware(['auth','verified'])->name('dashboard');



Route::group(['middleware' => ['auth','verified'], 'prefix' => 'dashboard'], function () {
    Route::get('/posts', ListPosts::class)->name('posts');
    Route::get('/tags', ListTags::class)->name('tags');
    Route::get('/posts/new', Post::class)->name('posts.new');
    Route::get('/posts/e/{post}', Post::class)->name('posts.update');
    Route::get('/stats/{post}', ViewStats::class)->name('stats.show');
    Route::get('/insights', Insights::class)->name('insights');
    Route::get('/blog/{blog}/customize', CustomizeBlog::class)->name('blog.customize');
    Route::get('/account', Account::class)->name('account');
});

require __DIR__ . '/auth.php';

//blog
Route::get('/{name}', [PostController::class, 'index'])->name('posts.index');
Route::get('/{name}/feed', FeedController::class);
Route::get('/{name}/{post}', [PostController::class, 'show'])->name('posts.show');
