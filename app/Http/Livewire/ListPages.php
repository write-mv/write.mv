<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;
use Livewire\WithPagination;

class ListPages extends Component
{
    use WithPagination;

    public $perPage = 8;
    public $sortField = 'created_at';
    public $sortAsc = true;
    public $search = null;
    public $showConfirmModal = false;
    public $filter = "published";

    public $page_delete_id;

    protected $queryString = ['search'];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function switchFilter($filter)
    {
        $this->filter = $filter;
    }

    public function openDeleteModal($id)
    {
        $this->page_delete_id = $id;
        $this->showConfirmModal = true;
    }

    public function destroy()
    {
        Page::findOrFail($this->page_delete_id)->delete();
        $this->showConfirmModal = false;
        $this->notify('Page deleted.');
    }

    public function moveToDraft(Page $page)
    {
        $page->update([
            "published" => false
        ]);

        $this->notify('Page drafted.');
    }

    public function publishNow(Page $page)
    {
        $page->update([
            "published" => true,
            "published_date" => now()
        ]);

        $this->notify('Page published.');
    }

    public function load()
    {
        $this->perPage += 4;
    }


    public function render()
    {
        $query = Page::PageTabFilter($this->filter)->with('blog')->search($this->search)
            ->latest('created_at');


        return view('livewire.list-pages', [
            'pages' => $query->paginate($this->perPage),
            'all_page_count' => Page::count(),
            'draft_page_count' => Page::draft()->count(),
            'published_page_count' => Page::live()->count(),
            'scheduled_page_count' => Page::scheduled()->count(),
        ]);
    }
}
