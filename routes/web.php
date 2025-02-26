<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/vote');
    } else {
        return view('welcome');
    }
})->name('home');

Route::get('vote', function() {
    return view('vote', []);
})
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
});

require __DIR__.'/auth.php';
