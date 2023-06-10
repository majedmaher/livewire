<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        $users = User::latest()->get();
        return view('livewire.user.table', compact('users'))->layout('layouts.dashboard');
    }
}
