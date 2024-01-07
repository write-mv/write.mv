<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\ChangeLogController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PreviewAnonymousPosts;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\WhatsNewController;
use App\Http\Livewire\CustomizeBlog;
use App\Http\Livewire\Insights;
use App\Http\Livewire\ListPages;
use App\Http\Livewire\ListPosts;
use App\Http\Livewire\ListResponses;
use App\Http\Livewire\ListTags;
use App\Http\Livewire\Page;
use App\Http\Livewire\Post;
use App\Http\Livewire\ViewStats;
use App\Models\Blog;
use App\Models\Post as PostModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;

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

Route::get('/test', fn () => view('test'));

Route::get('/auth/github', (new SignInController())->github(...));
Route::get('/auth/github/redirect', (new SignInController())->githubRedirect(...));

//if (env('APP_ENV') != 'local') {
Route::domain('{name}.write.mv')->as('domain.')->group(function () {
    Route::get('/', (new PostController())->index(...))->name('posts.index');
    Route::get('/feed', FeedController::class);
    Route::get('/pages/{page}', PageController::class)->name('pages.show');
    Route::get('/tags', (new TagController())->index(...))->name('tags.index');
    Route::get('/tags/{tag:slug}', (new TagController())->show(...))->name('tags.show');
    Route::get('/{post}', (new PostController())->show(...))->name('posts.show');
});
//}

Route::get('/', fn () => view('pages.welcome'));

Route::get('/explore', ExploreController::class)->name('explore');
//Route::get('/explore', fn () => view('coming-soon'))->name('explore');

Route::get('/screen-casts', fn () => view('coming-soon'));
Route::get('/about', fn () => view('pages.about'));
Route::get('/publishing-guideline', fn () => view('pages.publishing-guideline'));

Route::get('/whats-new', WhatsNewController::class);
Route::get('/change-log', ChangeLogController::class);

//['auth','verified']
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'dashboard'], function () {
    Route::get('/', fn () => view('dashboard', [
        'blog' => Blog::first(),
        'total_post_count' => PostModel::count(),
        'published_post_count' => PostModel::live()->count(),
        'scheduled_post_count' => PostModel::scheduled()->count(),
        'latest_activities' => Activity::causedBy(Auth::user())->latest()->limit(5)->get(),
    ]))->name('dashboard');

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

require __DIR__.'/auth.php';

//anonymous

Route::get('/pub/{post}', PreviewAnonymousPosts::class)->name('anonymous.show');

//blog
Route::get('/{name}/tags', (new TagController())->index(...))->name('tags.index');
Route::get('/{name}/tags/{tag:slug}', (new TagController())->show(...))->name('tags.show');

Route::get('/{name}/pages/{page}', PageController::class)->name('pages.show');
Route::get('/{name}', (new PostController())->index(...))->name('posts.index');
Route::get('/{name}/feed', FeedController::class);
Route::get('/{name}/{post}', (new PostController())->show(...))->name('posts.show');

//Route::post('/{post}/comments', [CommentsController::class, 'store'])->name('comments.store');
