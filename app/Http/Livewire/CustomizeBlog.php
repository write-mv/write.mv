<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;
use App\Models\Theme;
use Illuminate\Validation\Rule;
use App\Rules\CheckIfBlockedNameIsUsed;
use Illuminate\Support\Str;

class CustomizeBlog extends Component
{
    public Blog $blog;

    public function mount(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function save()
    {
        $this->validate();

        $this->blog->save();
        $this->blog->update([
            "url" => url("/" . Str::slug($this->blog->name))
        ]);
        $this->notify('Blog information updated.');

    }

    protected function rules()
    {
        return [
            "blog.site_title" => "required|string",
            "blog.description" => "nullable|string",
            "blog.name" => ['required', 'string','min:4',  new CheckIfBlockedNameIsUsed(),Rule::unique('blogs', 'name')->ignore($this->blog->id, 'id')],
            "blog.theme_id" => "nullable"
        ];
    }

    public function render()
    {
        return view('livewire.customize-blog', [
            'themes' => Theme::all()
        ]);
    }
}
