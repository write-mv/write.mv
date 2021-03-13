<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;

class CustomizeBlog extends Component
{
    public Blog $blog;

    protected $rules = [
        "blog.site_title" => "required",
        "blog.description" => "required",
        "blog.is_grid" => "required"
    ];

    public function mount(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function save()
    {
        $this->validate();

        $this->blog->save();
        $this->notify('Blog information updated.');

    }

    public function render()
    {
        return view('livewire.customize-blog');
    }
}
