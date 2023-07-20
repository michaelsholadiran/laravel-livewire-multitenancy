<?php

namespace App\Http\Livewire\Superadmin\Domain;

use App\Models\Tenant;
use Livewire\Component;

class Create extends Component
{

    public $domain = '';

    public function store()
    {


        $this->validate(
            [
                'domain' => 'required|min:3|unique:domains,tenant_id',

            ]
        );

        $tenant = Tenant::create(['id' => $this->domain]);
        $tenant->domains()->create(['domain' => $this->domain . '.' . config('app.url')]);


        // Contact::create($validatedData);
        session()->flash('message', 'Success');
        return $this->emit('redirect', route('superadmin.domain.index'));
        // return redirect()->route('superadmin.domain.index')->with('message', 'Success');
    }

    public function render()
    {
        return view('livewire.superadmin.domain.create')->extends('layouts.superadmin.app');
    }
}
