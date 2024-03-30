<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return redirect('categories');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/categories/create', [App\Http\Controllers\CategoryController::class, 'create']);
Route::get('categories/{id}/edit',[App\Http\Controllers\CategoryController::class,'edit']);
Route::post('/categories/create',[App\Http\Controllers\CategoryController::class,'store']);
Route::put('categories/{id}/update',[App\Http\Controllers\CategoryController::class,'update']);
Route::get('categories/{id}/delete',[App\Http\Controllers\CategoryController::class,'destroy']);

