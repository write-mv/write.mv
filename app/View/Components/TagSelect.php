<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TagSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $options, public $selected = [], public $trackBy = 'id', public $label = 'name')
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    #[\Override]
    public function render()
    {
        return view('components.tag-select');
    }
}
