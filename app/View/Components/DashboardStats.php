<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardStats extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    #[\Override]
    public function render()
    {
        return view('components.dashboard-stats');
    }
}
