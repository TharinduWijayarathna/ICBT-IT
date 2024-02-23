<?php

use App\Http\Controllers\AdminArea\HomeController as AdminAreaHomeController;
use App\Http\Controllers\AdminArea\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicArea\HomeController;
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

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/dashboard',[AdminAreaHomeController::class, 'index'])->name('dashboard');

Route::prefix('members')->group(function () {
    Route::get('/',[MemberController::class, 'index'])->name('members');
    Route::get('/{id}/get',[MemberController::class, 'get'])->name('members.get');
    Route::post('/store',[MemberController::class, 'store'])->name('members.store');
    Route::get('/all',[MemberController::class, 'all'])->name('members.all');
    Route::post('/{id}/update',[MemberController::class, 'update'])->name('members.update');
    Route::delete('/{id}/delete',[MemberController::class, 'delete'])->name('members.delete');
});

require __DIR__.'/auth.php';
