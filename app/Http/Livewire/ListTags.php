<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ListTags extends Component
{
    public $per_page = 8;

    public $search = null;

    public $editing = false;

    public $showEditModal = false;

    public $showConfirmModal = false;

    public Tag $tag;

    public $label = 'Create tag';

    public $tag_delete_id;

    public $sort = 'desc';

    protected $queryString = ['search', 'sort'];

    protected $messages = [
        'tag.slug.unique' => 'You already have a tag with that slug.',
    ];

    public $colors = [
        'green',
        'yellow',
        'gray',
        'red',
        'blue',
        'indigo',
        'purple',
        'pink',
    ];

    public function mount(): void
    {
        $this->tag = $this->makeBlankTag();
    }

    public function updatingTagName($name)
    {
        $this->tag->slug = Str::slug($name);
    }

    public function makeBlankTag(): Tag
    {
        return Tag::make();
    }

    public function create(): void
    {
        if ($this->tag->getKey()) {
            $this->tag = $this->makeBlankTag();
        }
        $this->editing = true;
        $this->showEditModal = true;
    }

    public function edit(Tag $tag): void
    {
        $this->label = 'Edit Tag';
        if ($this->tag->isNot($tag)) {
            $this->tag = $tag;
        }

        $this->showEditModal = true;
    }

    public function openDeleteModal($id)
    {
        $this->tag_delete_id = $id;
        $this->showConfirmModal = true;
    }

    public function destroy()
    {
        Tag::findOrFail($this->tag_delete_id)->delete();
        $this->showConfirmModal = false;
        $this->notify('Tag deleted.');
    }

    public function save(): void
    {
        $this->validate();

        $this->tag->blog_id = auth()->user()->team->blogs()->first()->id;

        $this->tag->save();
        $this->showEditModal = false;

        if ($this->editing) {

            $this->notify('Tag updated.');
        } else {
            $this->notify('Tag created.');
        }
    }

    public function load(): void
    {
        $this->per_page += 8;
    }

    protected function rules(): array
    {
        return [
            'tag.name' => 'required|string',
            'tag.slug' => ['required', 'string', Rule::unique('tags', 'slug')->where(fn ($query) => $query->where('blog_id', auth()->user()->team->blogs()->first()->id)->where('slug', $this->tag->slug))->ignore($this->tag->id, 'id')],
            'tag.description' => 'nullable',
        ];
    }

    public function render()
    {
        $tags = Tag::query()->search($this->search)->withCount('posts')
            ->orderBy('posts_count', $this->sort)
            ->paginate($this->per_page);

        return view('livewire.list-tags', [
            'tags' => $tags,
        ]);
    }
}
