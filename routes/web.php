<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyDocumentController;

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

// Home
Route::get('/', [MyDocumentController::class, "index"])->name('my-documents.all');

Route::prefix('documents')->group(function () {
    Route::get('/', [DocumentController::class, "index"])->name('documents.all');
    Route::post('/store', [DocumentController::class, "store"])->name('documents.store');
    Route::get('/{documents_id}/edit', [DocumentController::class, "edit"])->name('documents.edit');
    Route::post('/{documents_id}/update', [DocumentController::class, "update"])->name('documents.update');
    Route::get('/{documents_id}/delete', [DocumentController::class, "delete"])->name('documents.delete');
    Route::post('/user/add', [DocumentController::class, "addUser"])->name('documents.user.add');
    Route::get('/{documents_user_id}/user/delete', [DocumentController::class, "userRemove"])->name('documents.user.delete');
    Route::get('/all/list', [DocumentController::class, "all"])->name('documents.all.list');
    Route::get('/all/user/list', [DocumentController::class, "allDocumentUser"])->name('documents.user.all.list');
    Route::get('/all/user_documents/list', [DocumentController::class, "allUserDocuments"])->name('documents.users.all.list');


    Route::get('/document/{file_id}/delete', [DocumentController::class, "fileDelete"])->name('document.file.delete');
});


Route::prefix('my-documents')->group(function () {
    // Route::get('/', [MyDocumentController::class, "index"])->name('my-documents.all');
    Route::get('/{documents_id}/view', [MyDocumentController::class, "view"])->name('my-documents.view');
    Route::post('/{documents_id}/update', [MyDocumentController::class, "update"])->name('my-documents.update');
    Route::get('/{documents_id}/delete', [MyDocumentController::class, "delete"])->name('my-documents.delete');
    Route::post('/{documents_id}/store_button_click',[MyDocumentController::class, "downloadDocument"])->name('store.button.click');
    Route::get('/all/list', [MyDocumentController::class, "all"])->name('documents.all.list');
    Route::post('/{documents_id}/reply_date',[MyDocumentController::class, "replyDocument"])->name('my-documents.reply.date');
});


Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, "index"])->name('users.all');
    Route::get('/all', [UserController::class, "allUsers"])->name('users.all.list');
    Route::post('/store', [UserController::class, "store"])->name('users.store');
    Route::get('/{users_id}/edit', [UserController::class, "edit"])->name('users.edit');
    Route::post('/{users_id}/update', [UserController::class, "update"])->name('users.update');
    Route::post('/{users_id}/update/permissions', [UserController::class, "updatePermissions"])->name('users.update.permissions');
    Route::post('/{users_id}/update/password', [UserController::class, "updatePassword"])->name('users.update.password');
    Route::get('/{users_id}/delete', [UserController::class, "delete"])->name('users.delete');
    Route::get('/{users_id}/restore', [UserController::class, "restore"])->name('users.restore');
});

Route::prefix('report')->group(function () {
    Route::get('/', [DocumentController::class, "reportIndex"])->name('report.all');
    Route::post('/daily/user_documents', [DocumentController::class, "dailySenderReport"])->name('daily.report');
});
