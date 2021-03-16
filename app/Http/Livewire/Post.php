<?php

namespace App\Http\Livewire;

use App\Models\Post as PostModel;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class Post extends Component
{
    use WithFileUploads;

    public PostModel $post;
    public $upload;
    public $label = "Create Post";
    public $editing = false;
    public $showMetaModal = false;

    protected $messages = [
        'post.slug.unique' => 'You already have a post with that slug.'
    ];


    public function mount(PostModel $post)
    {
        if ($post->getKey()) {
            $this->label = "Edit Post";
            $this->editing = true;
            $this->post = $post;
        } else {
            $this->post = $this->makeBlankPost();
        }
    }

    public function removeFeaturedImage($image)
    {
        if ($image) {
            //Delete the already attached image
            if (Storage::disk('public')->exists($image)) {
                Storage::disk('public')->delete($image);
            }
            $this->post->featured_image = null;
        }
    }

    public function save()
    {
        $this->validate();

        $this->post->user_id = auth()->user()->id;
        $this->post->blog_id = auth()->user()->team->blogs()->first()->id;

        $this->post->save();


        $this->upload && $this->post->update([
            'featured_image' => $this->upload->store('featured_images', 'public'),
        ]);

        if ($this->editing) {
            session()->flash('notification', 'Post Updated.');
        } else {
            session()->flash('notification', 'Post Created.');
        }



        return redirect()->route('posts.update', $this->post);
    }

    public function makeBlankPost()
    {
        return PostModel::make([
            'published_date' => Carbon::now(),
            'display_name' => auth()->user()->name,
            'published' => true,
            'is_english' => false,
            'show_author' => true
        ]);
    }

    protected function rules()
    {
        return [
            'post.title' => ['required', 'string'],
            'post.slug' => ['required', 'string', Rule::unique('posts', 'slug')->where(function ($query) {
                return $query->where('blog_id', auth()->user()->team->blogs()->first()->id)->where('slug', $this->post->slug);
            })],
            'post.content' => 'required',
            'post.excerpt' => 'nullable|string',
            'post.published_date' => 'required',
            'post.published' => 'required',
            'post.is_english' => 'required',
            'post.show_author' => 'required',
            'post.display_name' => 'required',
            'post.featured_image' => 'nullable',
            'post.featured_image_caption' => 'nullable|string',
            'post.meta.title' => 'nullable',
            'post.meta.description' => 'nullable',
            'upload' => 'nullable|image|max:1000'

        ];
    }


    public function render()
    {
        return view('livewire.post');
    }
}
