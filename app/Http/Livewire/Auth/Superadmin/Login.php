<?php

namespace App\Http\Livewire\Auth\Superadmin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;
// use App\Http\Requests\Auth\LoginRequest;
// use Illuminate\Http\Request;

class Login extends Component
{

    public $email = '';
    public $password = '';


    public function store()
    {

        $this->validate(
            [
                'email' => 'required|email|min:3',
                'password' => 'required',
            ]
        );


        // dd($this->email, $this->password);
        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], false)) {


            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        return $this->emit('redirect', route('superadmin.domain.index'));
    }
    public function render()
    {
        return view('livewire.auth.superadmin.login')->extends('layouts.auth.superadmin.app');
    }
}
