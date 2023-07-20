<?php

namespace App\Http\Livewire\Superadmin\Admin;

use App\Models\User;
use App\Models\Domain;
use App\Models\Tenant;
use Livewire\Component;

class Create extends Component
{

    public $name = '';
    public $email = '';
    public $password = '';
    public $domains = [];
    public $tenant_ids = [];

    public function store()
    {

        $this->validate(
            [
                'name' => 'required|min:3',
                'email' => 'required|email|min:3|unique:users,email',
                'tenant_ids' => 'required',
            ]
        );

        $user =  new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->tenant_ids = $this->tenant_ids;
        $user->password = bcrypt($this->password);
        $user->account_type = 2;
        $user->save();

        Tenant::whereIn('id', $this->tenant_ids)->get()->runForEach(
            function () {
                $user =  new User;
                $user->name = $this->name;
                $user->email = $this->email;
                $user->tenant_ids = $this->tenant_ids;
                $user->password = bcrypt($this->password);
                $user->account_type = 2;
                $user->save();
            }
        );


        return $this->emit('redirect', route('superadmin.admin.index'));
        // return redirect()->route('superadmin.domain.index')->with('message', 'Success');
    }

    public function mount()
    {
        $domains = Domain::latest()->get();
        $this->domains = $domains;
    }


    public function render()
    {
        return view('livewire.superadmin.admin.create')->extends('layouts.superadmin.app');
    }
}
