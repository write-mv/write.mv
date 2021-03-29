<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ListTags extends Component
{
    public $per_page = 8;
    public $search = null;
    public $showEditModal = false;
    public $showConfirmModal = false;
    public Tag $editing;
    public $label = "Create tag";
    public $tag_delete_id;
    public $sort = "desc";

    protected $queryString = ['search', 'sort'];

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

    public function mount(): void
    {
        $this->editing = $this->makeBlankTag();
    }


    public function makeBlankTag(): Tag
    {
        return Tag::make();
    }

    public function create(): void
    {
       if($this->editing->getKey()) $this->editing = $this->makeBlankTag();
       $this->showEditModal = true;
    }

    public function edit(Tag $tag): void
    {
        $this->label = "Edit Tag";
        if ($this->editing->isNot($tag)) $this->editing = $tag;

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

   public function save() : void
   {
       $this->validate();
       $this->editing->save();
       $this->showEditModal = false;

       $this->notify("Tag created.");
   }

   public function load(): void
   {
       $this->per_page += 8;
   }

   protected function rules(): array
   {
       return [
        'editing.name' => 'required|string',
        'editing.slug' => ['required', 'string', Rule::unique('tags', 'slug')->where(function ($query) {
            return $query->where('slug', $this->editing->slug);
        })->ignore($this->editing->id, 'id')],
        'editing.description' => 'nullable'
       ];
   }
    
    public function render()
    {
        $tags = Tag::query()->search($this->search)->withCount('posts')
            ->orderBy('posts_count', $this->sort)
            ->paginate($this->per_page);

        return view('livewire.list-tags', [
            "tags" => $tags
        ]);
    }
}
