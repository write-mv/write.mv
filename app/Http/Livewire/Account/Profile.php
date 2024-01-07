<?php

namespace App\Http\Livewire\Account;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Profile extends Component
{
    public User $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function save(): void
    {
        $this->validate();

        $this->user->save();

        $this->notify('Account settings updated.');
    }

    protected function rules(): array
    {
        return [
            'user.name' => 'required',
            'user.email' => 'required|unique:users,email,'.$this->user->id,
        ];
    }

    public function render(): View
    {
        return view('livewire.account.profile');
    }
}
