<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ListResponses extends Component
{
    public $perPage = 8;
    public $sortAsc = true;
    public $search = null;

    public $filter = "all";

    protected $queryString = ['search'];

    public function switchFilter($filter)
    {
        $this->filter = $filter;
    }

    public function approved(Comment $comment)
    {
        $comment->update([
            "approved" => true
        ]);

        $this->notify('Comment approved.');
    }

    public function markAsPending(Comment $comment)
    {
        $comment->update([
            "approved" => false
        ]);

        $this->notify('Comment marked as pending.');
    }

    public function render()
    {
        $query = Comment::CommentTabFilter($this->filter)->with('post', 'owner')->search($this->search)->latest();

        return view('livewire.list-responses', [
            'comments' => $query->paginate($this->perPage),
            'all_comment_count' => Comment::AllBlogCommentsForTheUser()->count(),
            'pending_comment_count' => Comment::Pending()->count(),
            'approved_comment_count' => Comment::Approved()->count()
        ]);
    }
}
