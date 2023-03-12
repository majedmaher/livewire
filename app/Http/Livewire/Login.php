<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function submit()
    {
        $this->validate([
            'email' => 'required|string',
            'password' => 'required',
        ]);
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];
        if (Auth::attempt($credentials)) {
            return redirect(route('home'));
        }
        session()->flash('error_message', 'email or password is wrong 😟');
    }

    public function render()
    {
        return view('livewire.login')->layout('layouts.auth');
    }
}
