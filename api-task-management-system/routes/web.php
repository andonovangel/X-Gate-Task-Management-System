<?php

use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ProjectController;
use App\Http\Controllers\Web\TaskController;
use Illuminate\Support\Facades\Route;

Route::resource('projects', ProjectController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tasks', TaskController::class);


Route::get('/', function () {
    return view('welcome');
});
