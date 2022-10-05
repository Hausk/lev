<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HtmlContentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/images', [ImageController::class, 'index'])->middleware(['auth'])->name('images.index');
Route::get('/textes-site', [HtmlContentController::class, 'index'])->middleware(['auth'])->name('htmlcontent.index');
require __DIR__.'/auth.php';

