<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\Post;
use FiveamCode\LaravelNotionApi\Entities\Page;
use FiveamCode\LaravelNotionApi\Notion;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class ListPosts extends Component
{
    use WithPagination;

    public $perPage = 8;

    public $sortField = 'published_date';

    public $sortAsc = true;

    public $search = null;

    public $showConfirmModal = false;

    public $filter = 'published';

    public $blog;

    public $post_delete_id;

    protected $queryString = ['search'];

    public function mount()
    {
        $this->blog = Blog::first();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function switchFilter($filter)
    {
        $this->filter = $filter;
    }

    public function openDeleteModal($id)
    {
        $this->post_delete_id = $id;
        $this->showConfirmModal = true;
    }

    public function destroy()
    {
        Post::findOrFail($this->post_delete_id)->delete();
        $this->showConfirmModal = false;
        $this->notify('Post deleted.');
    }

    public function moveToDraft(Post $post)
    {
        $post->update([
            'published' => false,
        ]);

        $this->notify('Post drafted.');
    }

    public function publishNow(Post $post)
    {
        $post->update([
            'published' => true,
            'published_date' => now(),
        ]);

        $this->notify('Post published.');
    }

    public function draftNow(Page $page)
    {
    }

    public function load()
    {
        $this->perPage += 4;
    }

    public function getNotionPages()
    {
        $notion = new Notion($this->blog->notion_api_key);

        return Cache::remember($this->blog->name.'_notion', 300, function () use ($notion) {
            return $notion->search()
                ->onlyPages()
                ->query()
                ->asCollection();
        });
    }

    public function render()
    {
        if ($this->filter == 'notion') {
            $posts = $this->getNotionPages();
        } else {
            $posts = Post::PostTabFilter($this->filter)->with('blog', 'tags')->search($this->search)
                ->latest('published_date')->paginate($this->perPage);
        }

        return view('livewire.list-posts', [
            'posts' => $posts,
            'notion_pages' => $this->blog->isNotionEnabled() ? $this->getNotionPages() : null,
            'all_post_count' => Post::count(),
            'draft_post_count' => Post::draft()->count(),
            'published_post_count' => Post::live()->count(),
            'scheduled_post_count' => Post::scheduled()->count(),
        ]);
    }
}
