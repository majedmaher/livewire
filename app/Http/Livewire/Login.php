<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Livewire\Component;

class Login extends Component
{
    public $email, $password;

    public function submit()
    {
        $this->validate([
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required',
        ]);

        $user = User::where('email', $this->email)->first();
        if ($user) {
            if (Hash::check($this->password, $user->password)) {
                auth()->login($user);
                return redirect()->route('home');
            } else {
                $this->addError('password', 'password is invalid');
            }
        } else {
            $this->addError('email', 'Email not found');
        }
    }

    public function render()
    {
        return view('livewire.login')->layout('layouts.auth');
    }
}
