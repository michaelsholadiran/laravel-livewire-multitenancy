<?php

namespace App\Http\Livewire\Layout\Superadmin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{



    public function destroy()
    {
        // dd('ok');
        Auth::guard('web')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return $this->emit('redirect', route('login'));
    }

    public function render()
    {
        return view('livewire.layout.superadmin.header');
    }
}
