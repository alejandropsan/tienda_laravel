<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;
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
Route::get('/', [MainController::class, 'index']);
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

    Route::get('/register', function() { return view('user.register'); })->name('register');

    Route::get('/user-session', [MainController::class, 'userType'])->name('user.session');
    Route::post('/user-session', [MainController::class, 'getUser'])->name('user.session');

    //Route::get('/user-session/{type_user}', [MainController::class, 'userLaravel'])->name('user.type');
});


