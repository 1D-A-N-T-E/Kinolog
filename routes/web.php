<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Help;
use App\Http\Controllers\mainController;
use App\Http\Controllers\contactsController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
/*
Route::get('/', function () {
    return 'aaaaaaaa';
});
*/
/*
Route::get('/Posts', [PostController::class, 'index'])->name('post.index');
Route::get('/Posts/create', [PostController::class, 'create']);
Route::get('/Posts/update', [PostController::class, 'update']);
Route::get('/Posts/delete', [PostController::class, 'delete']);
Route::get('/Posts/fisrt_or_crate', [PostController::class, 'firstOrCreatePost']);
Route::get('/Posts/update_or_crate', [PostController::class, 'updateOrCreatePost']);
Route::get('help', [Help::class,'index']);
*/
Route::get('/Login', [LoginController::class, 'index'])->name('Login.index');
Route::get('/Register', [RegisterController::class, 'index'])->name('Register.index');


Route::get('/', [mainController::class, 'index'])->name('main.index');
Route::get('/contacts', [contactsController::class, 'index'])->name('contacts.index');
Route::get('/about', [aboutController::class, 'index'])->name('about.index');