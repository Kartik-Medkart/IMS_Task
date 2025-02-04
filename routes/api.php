<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MoleculeController;
use App\Http\Controllers\DraftProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/user', [AuthController::class, 'user']);
//     Route::post('/logout', [AuthController::class, 'logout']);
// });

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'get']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/molecule', [MoleculeController::class, 'index']);
    Route::get('/molecule/{id}', [MoleculeController::class, 'get']);
    Route::post('/molecule', [MoleculeController::class, 'store']);
    Route::put('/molecule', [MoleculeController::class, 'update']);
    Route::delete('/molecule/{id}', [MoleculeController::class, 'delete']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/draft-product', [DraftProductController::class, 'index']);
    Route::get('/draft-product/{id}', [DraftProductController::class, 'get']);
    Route::post('/draft-product', [DraftProductController::class, 'store']);
    Route::put('/draft-product', [DraftProductController::class, 'update']);
    Route::patch('/draft-product/{id}', [DraftProductController::class, 'publish']);
    Route::delete('/draft-product/{id}', [DraftProductController::class, 'delete']);
});