<?php

namespace App\Http\Livewire\Superadmin\Domain;

use App\Models\Domain;
use App\Models\Tenant;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Edit extends Component
{
    public $domain = '';
    public $domain_id = '';


    public function update()
    {

        $this->validate(
            [
                'domain' => 'required|min:3|unique:domains,tenant_id',

            ]
        );


        $domain =  Domain::find($this->domain_id);
        $tenant = Tenant::find($domain->tenant_id);
        // DB::statement("DROP DATABASE `{$tenant->tenancy_db_name}`");
        $tenant->delete();

        $tenant = Tenant::create(['id' => $this->domain]);
        $tenant->domains()->create(['domain' => $this->domain . '.' . config('app.url')]);

        session()->flash('message', 'Success');
        return $this->emit('redirect', route('superadmin.domain.index'));
    }

    public function mount()
    {
        // dd(request()->domain);
        $domain =  Domain::find(request()->id);
        $this->domain = $domain->tenant_id;
        $this->domain_id = request()->id;
    }

    public function render()
    {

        return view('livewire.superadmin.domain.edit')->extends('layouts.superadmin.app');
    }
}
