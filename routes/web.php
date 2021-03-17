<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('post-category', CategoryController::class);

Route::get('post-category-unpublished/{id}', 'CategoryController@unpublishedCategory')->name('category.unpublished');
Route::get('post-category-published/{id}', 'CategoryController@publishedCategory')->name('category.published');


//Route::get('post-category-unpublished/{id}', [App\Http\Controllers\CategoryController::class, 'unpublishedCategory'])->name('category.unpublished');
