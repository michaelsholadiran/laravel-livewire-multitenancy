<?php

namespace App\Http\Livewire\Superadmin\Admin;

use App\Models\User;
use App\Models\Tenant;
use Livewire\Component;

class Index extends Component
{

    protected $listeners = ['destroy'];
    protected $email = '';

    public function destroy($id)
    {
        $user =  User::find($id);
        $this->email = $user->email;

        Tenant::whereIn('id', $user->tenant_ids)->get()->runForEach(
            function () {
                $user =  User::where('email', $this->email)->delete();
            }
        );
        $user->delete();
    }

    public function render()
    {

        $list = User::where('account_type', 2)->latest()->get();
        return view('livewire.superadmin.admin.index', compact('list'))->extends('layouts.superadmin.app');
    }
}
