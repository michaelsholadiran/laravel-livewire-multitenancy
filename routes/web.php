<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });





Route::middleware('auth')->group(
  function () {
    Route::get('domain', \App\Http\Livewire\Superadmin\Domain\Index::class)->name('superadmin.domain.index');
    Route::get('domain/create', \App\Http\Livewire\Superadmin\Domain\Create::class)->name('superadmin.domain.create');
    Route::get('domain/{id}/edit', \App\Http\Livewire\Superadmin\Domain\Edit::class)->name('superadmin.domain.edit');

    Route::get('admin', \App\Http\Livewire\Superadmin\Admin\Index::class)->name('superadmin.admin.index');
    Route::get('admin/create', \App\Http\Livewire\Superadmin\Admin\Create::class)->name('superadmin.admin.create');
    Route::get('admin/{id}/edit', \App\Http\Livewire\Superadmin\Admin\Edit::class)->name('superadmin.admin.edit');
  }
);

Route::middleware('guest')->group(
  function () {
    Route::get('login', \App\Http\Livewire\Auth\Superadmin\Login::class)->name('login');
    Route::get('register', \App\Http\Livewire\Auth\Superadmin\Register::class)->name('register');
  }
);
// require __DIR__ . '/auth.php';
