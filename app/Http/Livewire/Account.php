<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Account extends Component
{
    public User $user;


    public function mount()
    {
        $this->user = auth()->user();
    }

    public function save()
    {
        $this->validate();

        $this->user->save();

        $this->notify("Account settings updated.");
    }

    protected function rules()
    {
        return [
            'user.name' => 'required',
            'user.email' => 'required|unique:users,email,' . $this->user->id,
            'user.password' => 'nullable|string|min:8'
        ];
    }

    public function render()
    {
        return view('livewire.account');
    }
}
