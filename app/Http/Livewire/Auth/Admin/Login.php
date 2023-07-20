<?php

namespace App\Http\Livewire\Auth\Admin;

use App\Models\User;
use App\Models\Tenant;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;
// use App\Http\Requests\Auth\LoginRequest;
// use Illuminate\Http\Request;

class Login extends Component
{

    public $email = '';
    public $password = '';
    public $arr = [];


    public function store()
    {

        $this->validate(
            [
                'email' => 'required|email|min:3',
                'password' => 'required',
            ]
        );

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], false)) {


            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }


        $arr = [];


        Tenant::whereIn('id', auth()->user()->tenant_ids)->get()->runForEach(
            function ($tenant) {
                // dd(request()->root());
                $current_subdomain = explode('.', request()->getHost())[0];
                if ($current_subdomain != $tenant->id) {

                    $user = User::where('email', $this->email)->first();

                    $token = tenancy()->impersonate($tenant, $user->id, '/user');
                    $url = str_replace($current_subdomain, $tenant->id, request()->root()) . "/impersonate/{$token->token}";

                    array_push($this->arr, $url);
                }
            }
        );

        $this->emit('urls', $this->arr);

        return $this->emit('redirect', route('admin.user.index'));
    }
    public function render()
    {
        return view('livewire.auth.admin.login')->extends('layouts.auth.admin.app');
    }
}
