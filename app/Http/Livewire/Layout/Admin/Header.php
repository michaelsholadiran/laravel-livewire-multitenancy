<?php

namespace App\Http\Livewire\Layout\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{



    public function destroy()
    {

        Auth::guard('web')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return $this->emit('redirect', route('login'));
    }

    public function render()
    {
        return view('livewire.layout.admin.header');
    }
}
