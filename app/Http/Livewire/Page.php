<?php

namespace App\Http\Livewire;

use App\Models\Page as PageModel;
use App\Modules\ThaanaTransliterator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Page extends Component
{
    public PageModel $page;

    public $label = 'Create Page';

    public $editing = false;

    public function mount(PageModel $page)
    {
        if ($page->getKey()) {
            $this->label = 'Update Page';
            $this->editing = true;
            $this->page = $page;
        } else {
            $this->page = $this->makeBlankPage();
        }
    }

    /**
     * Automatically generating the slug and filling the input
     *
     * @param $title $title [explicite description]
     * @return void
     */
    public function updatingPageTitle($title)
    {
        if ($this->page->is_english) {
            $this->page->slug = Str::slug($title);
        } else {
            $this->page->slug = Str::slug(ThaanaTransliterator::transliterate($title));
        }
    }

    public function save()
    {
        $this->validate();

        $this->page->blog_id = auth()->user()->team->blogs()->first()->id;

        $this->page->save();

        if ($this->editing) {
            session()->flash('notification', 'Page Updated.');
        } else {
            session()->flash('notification', 'Page Created.');
        }

        return redirect()->route('pages.update', $this->page);
    }

    public function makeBlankPage()
    {
        return PageModel::make([
            'published_date' => Carbon::now(),
            'published' => true,
            'is_english' => false,
        ]);
    }

    protected function rules()
    {
        return [
            'page.title' => ['required', 'string'],
            'page.slug' => ['required', 'string', Rule::unique('posts', 'slug')->where(fn($query) => $query->where('blog_id', auth()->user()->team->blogs()->first()->id)->where('slug', $this->page->slug))->ignore($this->page->id, 'id')],
            'page.content' => 'required',
            'page.published_date' => 'required',
            'page.published' => 'required',
            'page.is_english' => 'required',
        ];
    }

    public function render()
    {
        return view('livewire.page');
    }
}
