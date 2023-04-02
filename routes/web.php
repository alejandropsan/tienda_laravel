<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Models\User;

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

// RUTAS PRODUCTO
Route::get('/', [MainController::class, 'index'])->name('welcome');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::match(['put', 'patch'], 'products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// RUTAS USUARIO
Route::prefix('users')->group(function(){
    //

    Route::get('/register', function() { return view('users.register'); })->name('register');
    Route::post('/register-save', [UserController::class, 'registerSave'])->name('register.save');
    Route::get('/login', function() { return view('users.login'); })->name('login');
    Route::post('/login-send', [UserController::class, 'login'])->name('login.send');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/user-session', [MainController::class, 'userType'])->name('user.session');
    Route::post('/user-session', [MainController::class, 'getUser'])->name('user.session');
    Route::get('/send', [MainController::class, 'getUsers'])->name('user.send');

    //Route::get('/user-session/{type_user}', [MainController::class, 'userLaravel'])->name('user.type');
});


// TIPOS DE VENTAS

Route::prefix('videogames')->group(function() {
    Route::get('/select-videogames', [VideogameController::class, 'index'])->name('select.videogames');
});

Route::prefix('films')->group(function() {
    Route::get('/select-films', [FilmController::class, 'index'])->name('select.films');
});

Route::prefix('merchandising')->group(function() {
    Route::get('/select-merchandising', [MerchandisingController::class, 'index'])->name('select.merchandising');
});

Route::prefix('books')->group(function() {
    Route::get('/select-books', [BookController::class, 'index'])->name('select.books');
});

Route::prefix('podcasts')->group(function() {
    Route::get('/select-podcasts', [PodcastController::class, 'index'])->name('select.podcasts');
});

Route::prefix('series')->group(function() {
    Route::get('/select-series', [SerieController::class, 'index'])->name('select.series');
});


