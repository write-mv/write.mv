<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\ChangeLogController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WhatsNewController;
use App\Http\Controllers\Account\PasswordController;
use App\Http\Controllers\PageController;
use App\Http\Livewire\CustomizeBlog;
use App\Http\Livewire\Insights;
use App\Http\Livewire\ListPages;
use App\Http\Livewire\ListPosts;
use App\Http\Livewire\ListResponses;
use App\Http\Livewire\ListTags;
use App\Http\Livewire\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Post as PostModel;
use App\Http\Livewire\Post;
use App\Http\Livewire\ViewStats;
use App\Mail\WelcomeEmail;

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

Route::get('/email', fn() => new WelcomeEmail);

if (env('APP_ENV') != 'local') {
    Route::domain('{name}.write.mv')->as('domain.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('posts.index');
        Route::get('/feed', FeedController::class);
        Route::get('/{page}', PageController::class)->name('pages.show');
        Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
    });
}


Route::get('/', function () {
    return view('pages.welcome');
});

//Route::get('/explore', ExploreController::class)->name('explore');
Route::get('/explore', fn () => view('coming-soon'))->name('explore');

Route::get('/screen-casts', fn () => view('coming-soon'));
Route::get('/about', fn () => view('pages.about'));
Route::get('/publishing-guideline', fn () => view('pages.publishing-guideline'));


Route::get('/whats-new', WhatsNewController::class);
Route::get('/change-log', ChangeLogController::class);


//['auth','verified']
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view('dashboard', [
            'blog' => Blog::first(),
            'total_post_count' => PostModel::count(),
            'published_post_count' => PostModel::live()->count(),
            'scheduled_post_count' => PostModel::scheduled()->count()
        ]);
    })->name('dashboard');

  
    //Route::get('/responses', ListResponses::class)->name('responses');
    Route::get('/tags', ListTags::class)->name('tags');

    Route::get('/pages', ListPages::class)->name('pages');
    Route::get('/pages/new', Page::class)->name('pages.new');
    Route::get('/pages/e/{page}', Page::class)->name('pages.update');

    Route::get('/posts', ListPosts::class)->name('posts');
    Route::get('/posts/new', Post::class)->name('posts.new');
    Route::get('/posts/e/{post}', Post::class)->name('posts.update');


    Route::get('/stats/{post}', ViewStats::class)->name('stats.show');
    Route::get('/insights', Insights::class)->name('insights');
    Route::get('/blog/{blog}/customize', CustomizeBlog::class)->name('blog.customize');

    Route::get('/account', AccountController::class)->name('account');
});

require __DIR__ . '/auth.php';

//blog
Route::get('/{name}/{page}', PageController::class)->name('pages.show');
Route::get('/{name}', [PostController::class, 'index'])->name('posts.index');
Route::get('/{name}/feed', FeedController::class);
Route::get('/{name}/{post}', [PostController::class, 'show'])->name('posts.show');

//Route::post('/{post}/comments', [CommentsController::class, 'store'])->name('comments.store');
