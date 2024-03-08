<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminArea\EventController;
use App\Http\Controllers\PublicArea\HomeController;
use App\Http\Controllers\AdminArea\MemberController;
use App\Http\Controllers\AdminArea\BlogPostController;
use App\Http\Controllers\AdminArea\HomeController as AdminAreaHomeController;

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
Route::get('/public/members',[HomeController::class, 'members'])->name('home.members');
Route::get('/public/events',[HomeController::class, 'events'])->name('home.events');
Route::get('/public/blogs',[HomeController::class, 'blogs'])->name('home.blogs');

Route::get('/dashboard',[AdminAreaHomeController::class, 'index'])->name('dashboard');

Route::prefix('members')->group(function () {
    Route::get('/',[MemberController::class, 'index'])->name('members');
    Route::get('/{id}/get',[MemberController::class, 'get'])->name('members.get');
    Route::post('/store',[MemberController::class, 'store'])->name('members.store');
    Route::get('/all',[MemberController::class, 'all'])->name('members.all');
    Route::post('/{id}/update',[MemberController::class, 'update'])->name('members.update');
    Route::delete('/{id}/delete',[MemberController::class, 'delete'])->name('members.delete');
});

Route::prefix('events')->group(function () {
    Route::get('/',[EventController::class, 'index'])->name('events');
    Route::get('/{id}/get',[EventController::class, 'get'])->name('events.get');
    Route::post('/store',[EventController::class, 'store'])->name('events.store');
    Route::get('/all',[EventController::class, 'all'])->name('events.all');
    Route::post('/{id}/update',[EventController::class, 'update'])->name('events.update');
    Route::delete('/{id}/delete',[EventController::class, 'delete'])->name('events.delete');
});

Route::prefix('posts')->group(function () {
    Route::get('/',[BlogPostController::class, 'index'])->name('posts');
    Route::get('/{id}/get',[BlogPostController::class, 'get'])->name('posts.get');
    Route::post('/store',[BlogPostController::class, 'store'])->name('posts.store');
    Route::get('/all',[BlogPostController::class, 'all'])->name('posts.all');
    Route::post('/{id}/update',[BlogPostController::class, 'update'])->name('posts.update');
    Route::delete('/{id}/delete',[BlogPostController::class, 'delete'])->name('posts.delete');
});

require __DIR__.'/auth.php';
