<?php

namespace App\Http\Livewire\Auth\Admin;

use App\Models\User;
use App\Models\Tenant;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{

    public $name = '';
    public $email = '';
    public $password = '';

    public function store()
    {

        $this->validate(
            [
                'name' => 'required|min:3',
                'email' => 'required|email|min:3|unique:users,email',
                'password' => 'required',
            ]
        );

        // Tenant::all()->runForEach(function () {
        // App\Models\User::factory()->create();
        $user =  new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->account_type = 1;
        $user->save();
        Auth::login($user);
        // });




        return $this->emit('redirect', route('admin.user.index'));
    }

    public function render()
    {
        return view('livewire.auth.admin.register')->extends('layouts.auth.admin.app');
    }
}
