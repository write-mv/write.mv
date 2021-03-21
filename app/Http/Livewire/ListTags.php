<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class ListTags extends Component
{
    public $search = null;

    protected $queryString = ['search'];

    public $colors = [
        "green",
        "yellow",
        "gray",
        "red",
        "blue",
        "indigo",
        "purple",
        "pink"
    ];
    
    public function render()
    {
        $tags = Tag::query()->search($this->search)->withCount('posts')->get();
        return view('livewire.list-tags', [
            "tags" => $tags
        ]);
    }
}
