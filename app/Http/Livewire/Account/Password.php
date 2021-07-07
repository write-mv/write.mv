<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;
use App\Models\User;
use Illuminate\Contracts\View\View;
use App\Jobs\UpdatePassword;
use Illuminate\Support\Facades\Auth;
use App\Rules\PassCheckRule;
use Illuminate\Validation\Rules\Password as PasswordRule;

class Password extends Component
{
    public string $current_password = "";
    public string $password = "";
    public string $password_confirmation = "";


    public function update(): void
    {
        $this->validate();
        dispatch(new UpdatePassword(Auth::user(), $this->password));
        $this->notify("Password updated.");

        $this->reset('current_password', 'password', 'password_confirmation');
    }

    public function rules()
    {
        return [
            'current_password' => ['sometimes', 'required', new PassCheckRule()],
            'password' => ['required', 'confirmed', PasswordRule::min(8)->uncompromised()],
        ];
    }

    public function render(): View
    {
        return view('livewire.account.password');
    }
}
