<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{



    public $name = '';
    public $email = '';
    public $password = '';
    public $_id = '';


    public function update()
    {

        $this->validate(
            [
                'name' => 'required|min:3',
                'email' => 'required|email|min:3|unique:users,email,' . $this->_id,
            ]
        );

        $user =  User::find($this->_id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->save();

        return $this->emit('redirect', route('admin.user.index'));
    }

    public function mount()
    {

        $this->id = request()->_id;

        $user =  User::find(request()->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->_id = request()->id;
    }



    public function render()
    {
        return view('livewire.admin.user.edit')->extends('layouts.admin.app');
    }
}
