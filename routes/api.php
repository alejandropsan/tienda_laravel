<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// PRIMERA PRUEBA
Route::post('/crear-variable', [MainController::class, 'userType'])->name('crear.variable');

// MÉTODO AJAX
Route::post('/get-user-api/{user}', [MainController::class, 'getUser'])->name('get.user');
