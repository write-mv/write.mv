<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use DB;

class ListPosts extends Component
{
    use WithPagination;

    public $perPage = 8;
    public $sortField = 'published_date';
    public $sortAsc = true;
    public $search = '';
    public $showConfirmModal = false;
    public $filter = "published";

    public $post_delete_id;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
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
            "published" => false
        ]);

        $this->notify('Post drafted.');
    }

    public function publishNow(Post $post)
    {
        $post->update([
            "published" => true,
            "published_date" => now()
        ]);

        $this->notify('Post published.');
    }

    public function load()
    {
        $this->perPage += 4;
    }


    public function render()
    {
        $query = Post::PostTabFilter($this->filter)->search($this->search)
            ->latest();


        return view('livewire.list-posts', [
            'posts' => $query->paginate($this->perPage),
            'all_post_count' => Post::count(),
            'draft_post_count' => Post::draft()->count(),
            'published_post_count' => Post::live()->count(),
            'scheduled_post_count' => Post::scheduled()->count(),
        ]);
    }
}
