<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Insights extends Component
{
    public function render()
    {
        $blog = Auth::user()->team->blogs()->first();
        return view('livewire.insights', [
            "life_time_views" => views($blog)->count()
        ]);
    }
}
