<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Features\UserImpersonation;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    Route::get('/impersonate/{token}', function ($token) {
        return UserImpersonation::makeResponse($token);
    });

    Route::middleware('auth')->group(
        function () {

            Route::get('user', \App\Http\Livewire\Admin\User\Index::class)->name('admin.user.index');
            Route::get('user/create', \App\Http\Livewire\Admin\User\Create::class)->name('admin.user.create');
            Route::get('user/{id}/edit', \App\Http\Livewire\Admin\User\Edit::class)->name('admin.user.edit');
        }
    );

    Route::middleware('guest')->group(
        function () {
            Route::get('login', \App\Http\Livewire\Auth\Admin\Login::class)->name('login');
            // Route::get('register', \App\Http\Livewire\Auth\Admin\Register::class)->name('register');
        }
    );
});
