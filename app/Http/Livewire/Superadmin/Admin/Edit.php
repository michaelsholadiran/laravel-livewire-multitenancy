<?php

namespace App\Http\Livewire\Superadmin\Admin;

use App\Models\User;
use App\Models\Domain;
use App\Models\Tenant;
use Livewire\Component;

class Edit extends Component
{



    public $name = '';
    public $email = '';
    public $password = '';
    public $_id = '';
    public $domains = [];
    public $tenant_ids = [];


    public function update()
    {
        // dd($this->_id);
        $this->validate(
            [
                'name' => 'required|min:3',
                'email' => 'required|email|min:3|unique:users,email,' . $this->_id,
                'tenant_ids' => 'required',
            ]
        );


        $user =  User::find($this->_id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->tenant_ids = $this->tenant_ids;
        // $user->password = bcrypt($this->password);
        $user->save();


        $this->password = $user->password;
        Tenant::whereIn('id', $this->tenant_ids)->get()->runForEach(
            function () {
                $user =  User::where('email', $this->email)->first();
                if ($user) {
                    $user->name = $this->name;
                    $user->email = $this->email;
                    $user->tenant_ids = $this->tenant_ids;
                    // $user->password = bcrypt($this->password);
                    $user->save();
                } else {
                    $user =  new User;
                    $user->name = $this->name;
                    $user->email = $this->email;
                    $user->password = $this->password;
                    $user->account_type = 2;
                    $user->save();
                }
            }
        );

        return $this->emit('redirect', route('superadmin.admin.index'));
    }

    public function mount()
    {

        // $this->id = request()->_id;

        $user =  User::find(request()->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->tenant_ids = $user->tenant_ids;
        $this->_id = $user->id;

        $domains = Domain::latest()->get();
        $this->domains = $domains;
    }


    public function render()
    {
        return view('livewire.superadmin.admin.edit')->extends('layouts.superadmin.app');
    }
}
