<?php

namespace App\Http\Livewire\Superadmin\Domain;

use App\Models\Domain;
use App\Models\Tenant;
use Livewire\Component;

class Index extends Component
{


    protected $listeners = ['destroy'];

    public function destroy($id)
    {


        $domain =  Domain::find($id);
        $tenant = Tenant::find($domain->tenant_id);

        $tenant->delete();
    }

    public function render()
    {
        $list = Domain::latest()->get();
        return view('livewire.superadmin.domain.index', compact('list'))->extends('layouts.superadmin.app');
    }
}
