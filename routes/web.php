<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;


Route::get('/task', [TaskController::class, 'index']);
Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/task', [TaskController::class, 'store']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::delete('/task/{task}', [TaskController::class, 'destroy']);

Route::get('/', function () {
    return view('welcome');
}); 

Auth::routes();
// User Route
Route::middleware(['auth','user-role:user'])->group(function()
{
    Route::get("/home",[HomeController::class,'userHome'])->name('home');
});
// Editor Route
Route::middleware(['auth','user-role:editor'])->group(function()
{
    Route::get("/editor/home",[HomeController::class,'editorHome'])->name('home.editor');
});

// Admin Route
Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get("/admin/home",[HomeController::class,'adminHome'])->name('home.admin');
});
