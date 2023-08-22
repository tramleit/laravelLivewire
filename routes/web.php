<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


//// LiveWire Controller

use App\Http\Livewire\Admin\Users;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\TvLive;
use App\Http\Livewire\Admin\LiveTvCategory;



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


// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
// $role = Role::create(['name' => 'user']);

Route::get('/', function(){

    echo "Home Page";
    
});


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     Route::get('admin/users', [UserController::class, 'index'])->name('dashboard');
  
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/dashboard',Dashboard::class)->name('dashboard');
    Route::get('/users', Users::class )->name('dashboard');
    Route::get('/live_tv', TvLive::class )->name('live_tv');
    Route::get('/tv_category', LiveTvCategory::class )->name('tv_category');
     
  
});
