<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavbarLayout extends Component
{
    public function login_page()
    {
        return redirect()->route('login');
    }

    public function register_page()
    {
        return redirect()->route('register');
    }

    public function logout()
    {
        Auth::logout();

        return Redirect('login');
    }

    public function render()
    {
        return view('livewire.navbar-layout')->layout('layout');
    }
}
