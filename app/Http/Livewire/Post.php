<?php

namespace App\Http\Livewire;

use App\Models\Post as PostModel;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;

class Post extends Component
{
    public PostModel $post;

    public $label = "Create Post";

    public $editing = false;

    public $title;
    public $excerpt;
    public $slug;
    public $content;
    public $published_date;
    public $published = true;
    public $is_english = false;
    public $show_author = true;
    public $display_name;

    protected $rules = [
        'title' => 'required',
        'slug' => 'required',
        'content' => 'required',
        'published_date' => 'required',
        'published' => 'required',
        'is_english' => 'required',
        'show_author' => 'required',
        'display_name' => 'required'
    ];

    public function mount(PostModel $post)
    {
        if (empty($post->toArray())) {
            $this->published_date = Carbon::now();
            $this->display_name = auth()->user()->name;
        } else {
            $this->label = "Update post";
            $this->editing = true;
            $this->title = $post->title;
            $this->excerpt = $post->excerpt;
            $this->slug = $post->slug;
            $this->content = $post->content;
            $this->published_date = $post->published_date;
            $this->published = $post->published;
            $this->is_english = $post->is_english;
            $this->show_author = $post->show_author;
            $this->display_name = $post->display_name;
        }
    }

    public function save()
    {
        $this->validate();

        $blog = auth()->user()->team->blogs()->first();

        if(!$this->editing) {
            $post = auth()->user()->posts()->create([
                "title" => $this->title,
                "slug" => Str::slug($this->slug),
                "excerpt" => $this->excerpt,
                "is_english" => $this->is_english,
                "show_author" => $this->show_author,
                "display_name" => $this->display_name,
                "published" => $this->published,
                "published_date" => $this->published_date,
                "content" => $this->content,
                "blog_id" => $blog->id
            ]);
            session()->flash('notification', 'Post Created.');

            return redirect()->route('posts.update', $post);
        }else {

        $this->post->update([
            "title" => $this->title,
            "slug" => Str::slug($this->slug),
            "excerpt" => $this->excerpt,
            "is_english" => $this->is_english,
            "show_author" => $this->show_author,
            "display_name" => $this->display_name,
            "published" => $this->published,
            "published_date" => $this->published_date,
            "content" => $this->content,
            "blog_id" => $blog->id
        ]);

        session()->flash('notification', 'Post Updated.');
        return redirect()->route('posts.update', $this->post);
        }
    }

    public function render()
    {
        return view('livewire.post');
    }
}
