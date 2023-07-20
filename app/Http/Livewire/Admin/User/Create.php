<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class Create extends Component
{

    public $name = '';
    public $email = '';
    public $password = '';




    public function store()
    {

        $this->validate(
            [
                'name' => 'required|min:3',
                'password' => 'required|min:3',
                'email' => 'required|email|min:3|unique:users,email',
            ]
        );


        $user =  new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->account_type = 3;
        $user->save();


        return $this->emit('redirect', route('admin.user.index'));
        // return redirect()->route('admin.domain.index')->with('message', 'Success');
    }


    public function render()
    {
        return view('livewire.admin.user.create')->extends('layouts.admin.app');
    }
}
