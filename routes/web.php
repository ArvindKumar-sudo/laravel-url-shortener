<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\InviteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return redirect('/login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/short/{code}', [UrlController::class, 'redirect'])->name('urls.redirect');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/urls', [UrlController::class, 'index'])->name('urls.index');
    Route::post('/urls', [UrlController::class, 'store'])->name('urls.store');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:SuperAdmin,Admin'])->group(function () {
    Route::get('/invite', [InviteController::class, 'create'])->name('invite.create');
    Route::post('/invite', [InviteController::class, 'store'])->name('invite.store');

});

require __DIR__.'/auth.php';
