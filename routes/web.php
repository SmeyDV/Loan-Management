<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\CustomerController;

Route::resource('customers', CustomerController::class)->middleware('auth');




Route::resource('loans', LoanController::class)->middleware(['auth']);

Route::get('/', function () {
    return redirect('/dashboard');
});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

Route::get('/admin/login', [LoginController::class, 'showAdminLogin']);
Route::post('/admin/login', [LoginController::class, 'adminLogin']);

Route::post('/toggle-theme', function () {
    $new = session('theme', 'light') === 'dark' ? 'light' : 'dark';
    session(['theme' => $new]);
    return back();
})->name('theme.toggle');
