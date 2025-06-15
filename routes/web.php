<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/', [mainController::class, 'index'])->name('main.index');

// Kontaktu lapas maršruts
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');

// E-pasta sūtīšanas maršruts
Route::post('/contacts/send', [ContactsController::class, 'send'])->name('contacts.send');
Route::get('/about', [aboutController::class, 'index'])->name('about.index');



Route::middleware('guest')->group(function () {
    
    Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegistrationController::class, 'register']);
});



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
        Route::get('/{user}/edit', [AdminController::class, 'edit'])->name('edit'); 
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
   Route::post('/profile/{user}/pets', [ProfileController::class, 'addPet'])->name('pets.store');
    Route::get('/pets/{pet}/edit', [ProfileController::class, 'editPet'])->name('pets.edit');
    Route::put('/pets/{pet}', [ProfileController::class, 'updatePet'])->name('pets.update');
    Route::delete('/pets/{pet}', [ProfileController::class, 'destroyPet'])->name('pets.destroy'); 

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});