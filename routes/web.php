<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\SiteController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',                     [SiteController::class, 'index'])->name('index');

Route::get('admin/index',           [SlidersController::class, 'list'])->name('lista');
Route::get('admin/create',          [SlidersController::class, 'create'])->name('create');
Route::post('admin/create',         [SlidersController::class, 'store'])->name('store');
Route::get('admin/edit/{slide}',    [SlidersController::class, 'edit'])->name('editar');
Route::post('admin/edit/{slide}',   [SlidersController::class, 'update'])->name('update');
Route::get('admin/delete/{slide}',  [SlidersController::class, 'delete'])->name('deletar');

