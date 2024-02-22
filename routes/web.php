<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',[BlogController::class,'index']);
Route::get('/details/{id}',[BlogController::class,'details'])->name('details');
Route::prefix('author')->group(function () {
        Route::get('/about', [AdminController::class, "about"])->name('about');
        Route::get('/blog', [AdminController::class, "index"])->name('blog');
        Route::get('/create', [AdminController::class, "create"])->name('create');
        Route::post("/insert", [AdminController::class, "insert"]);
        Route::get('/blog/delete/{id}', [AdminController::class, 'delete'])->name('delete');
        Route::get('/blog/change/{id}', [AdminController::class, 'change'])->name('change');
        Route::get('/blog/edit/{id}', [AdminController::class, 'edit'])->name('edit');
        Route::post('/blog/update/{id}', [AdminController::class, 'update'])->name('update');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
