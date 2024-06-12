<?php

use App\Http\Controllers\MoodleUsersController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('/post', [MoodleUsersController::class, 'createUser'])->name('user.create');
Route::get('/{id?}', [MoodleUsersController::class, 'postIndex'])->name('user.search');
Route::get('/create', [MoodleUsersController::class, 'createIndex'])->name('user.index');
Route::delete('/delete/{id}', [MoodleUsersController::class, 'deleteUser'])->name('user.delete');
Route::get('/user/edit/{id}',[MoodleUsersController::class, 'getEdit'])->name('user.edit');

Route::fallback(function () {
    return view('404');
});
