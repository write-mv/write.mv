<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ListPosts extends Component
{
    use WithPagination;
    
    public $perPage = 8;
    public $sortField = 'publish_date';
    public $sortAsc = true;
    public $search = '';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }


    public function render()
    {
        $query = Post::search($this->search)
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');

        return view('livewire.list-posts', [
            'posts' => $query->paginate($this->perPage)
        ]);
    }
}
