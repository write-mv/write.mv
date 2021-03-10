<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;

class CustomizeBlog extends Component
{
    public Blog $blog;

    protected $rules = [
        "blog.site_title" => "required",
        "blog.description" => "required"
    ];

    public function mount(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function save()
    {
        $this->validate();

        $this->blog->save();

    }

    public function render()
    {
        return view('livewire.customize-blog');
    }
}
