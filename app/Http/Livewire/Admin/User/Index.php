<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{

    protected $listeners = ['destroy'];

    public function destroy($id)
    {
        $user =  User::find($id)->delete();
    }

    public function render()
    {

        $list = User::where('account_type', 3)->latest()->get();
        return view('livewire.admin.user.index', compact('list'))->extends('layouts.admin.app');
    }
}
