<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view("welcome");
});

Route::get('/about', [AdminController::class, "about"])->name('about');

Route::get('/blog', [AdminController::class, "index"])->name('blog');

Route::get('/create', [AdminController::class, "create"])->name('create');

Route::post("/insert",[AdminController::class,"insert"]);

Route::get('/blog/delete/{id}',[AdminController::class,'delete'])->name('delete');
