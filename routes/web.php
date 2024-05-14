<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('dashboard', [DashboardController::class, 'graph'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('anggota-perkhidmatan', AppController::class);
Route::get('app/eksport', [AppController::class, 'eksport'])->name('anggota-perkhidmatan.eskport');


require __DIR__.'/auth.php';

Route::get('/test', function () {
    if(5 > 3) {
        echo "true";
    } else {
        echo "false";
    }
    }
   
);
require __DIR__.'/auth.php';
