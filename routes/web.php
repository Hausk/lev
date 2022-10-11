<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HtmlContentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Redirect;
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

Route::controller(ImageController::class)->group(function(){
    Route::get('image-upload', 'index')->name('image.index');
    Route::post('image-upload', 'store')->name('image.store');
    Route::delete('image-upload/{image}', 'destroy')->name('image.destroy');
});

Route::resource('categories', CategoriesController::class)
    ->only(['index', 'store'])
    ->middleware(['auth']);

Route::resource('posts', PostController::class)
    ->only(['index', 'store'])
    ->middleware(['auth']);

require __DIR__.'/auth.php';

