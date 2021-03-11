<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NewPost extends Component
{
    public $content;
    
    public function render()
    {
        return view('livewire.new-post');
    }
}
