<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\UrlController;
use App\Http\Middleware\CheckModuleActive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/modules', [ModuleController::class, 'index'])->middleware('auth:sanctum');
Route::get('/modules/{id}/activate', [ModuleController::class, 'activeModule'])->middleware('auth:sanctum');
Route::get('/modules/{id}/desactivate', [ModuleController::class, 'desactivateModule'])->middleware('auth:sanctum');
Route::get('/module/{id}', [ModuleController::class, 'getOneModule'])->middleware([CheckModuleActive::class, 'auth:sanctum']);


Route::post('/shorten', [UrlController::class, 'createShortUrl'])->middleware('auth:sanctum');
Route::get('/links', [UrlController::class, 'links'])->middleware('auth:sanctum');
