<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Help;
use App\Http\Controllers\mainController;
use App\Http\Controllers\contactsController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
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
//Route::get('/Login', [LoginController::class, 'index'])->name('Login.index');
//Route::get('/Register', [RegisterController::class, 'index'])->name('Register.index');
//Route::get('/', [LoginController::class, 'HomeController@index']);

Route::get('/', [mainController::class, 'index'])->name('main.index');
Route::get('/contacts', [contactsController::class, 'index'])->name('contacts.index');
Route::get('/about', [aboutController::class, 'index'])->name('about.index');



Route::middleware('guest')->group(function () {
    // Ja izmantojat RegistrationController
    Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegistrationController::class, 'register']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

// Profila maršruts
Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');

// Izrakstīšanās maršruts
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');



Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    // Galvenā admina lapa
    Route::get('/', [AdminController::class, 'index'])->name('index');
    
    // Lietotāju pārvalde
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/', [AdminController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [AdminController::class, 'edit'])->name('edit'); // Šis bija trūkstošais maršruts
        Route::put('/{user}', [AdminController::class, 'update'])->name('update');
        Route::delete('/{user}', [AdminController::class, 'destroy'])->name('destroy');
    });
});

Route::middleware(['auth'])->group(function () {
    // Profila maršruti

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    
    // Mājdzīvnieka dzēšana
   // Route::delete('/pets/{user}', [ProfileController::class, 'destroyPet'])->name('pets.destroy');
   Route::post('/profile/{user}/pets', [ProfileController::class, 'addPet'])->name('pets.store');
    Route::get('/pets/{pet}/edit', [ProfileController::class, 'editPet'])->name('pets.edit');
    Route::put('/pets/{pet}', [ProfileController::class, 'updatePet'])->name('pets.update');
    Route::delete('/pets/{pet}', [ProfileController::class, 'destroyPet'])->name('pets.destroy'); 

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});