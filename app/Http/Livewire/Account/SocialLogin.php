<?php

namespace App\Http\Livewire\Account;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SocialLogin extends Component
{
    public User $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render(): View
    {
        return view('livewire.account.social-login');
    }
}
