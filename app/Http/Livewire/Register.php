<?php

namespace App\Http\Livewire;


use App\Models\User;
use Livewire\Component;


class Register extends Component
{

    public $user;

    public function register()
    {
        $this->validate([
            'user.name' => 'required|string|max:255',
            'user.email' => 'required|email|unique:users,email',
            'user.password' => 'required|min:6',
        ]);
        $this->user['password'] = bcrypt($this->user['password']);

        $user = User::create($this->user);
        $this->emit('alertSuccess', __("Your registration has been completed successfully. We will contact you soon. Thank you"));
        $this->user = [];
    }

    public function render()
    {
        return view('livewire.register')->layout('layouts.auth');
    }
}
