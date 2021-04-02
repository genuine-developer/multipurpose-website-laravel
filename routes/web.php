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
Route::get('/authbasecontent', [App\Http\Controllers\HomeController::class, 'authbasecontent'])->name('authbasecontent');
Route::get('/profile','ProfileController@index' )->name('admin.profile');

//Category Routes
Route::resource('post-category', CategoryController::class);

Route::get('post-category-unpublished/{id}', 'CategoryController@unpublishedCategory')->name('category.unpublished');
Route::get('post-category-published/{id}', 'CategoryController@publishedCategory')->name('category.published');

Route::get('post-category-edit/{id}','CategoryController@edit');
Route::post('post-category-update','CategoryController@update')->name('category.update');

Route::get('post-category-trash','CategoryController@trash')->name('category.trash');
Route::get('post-category-restore/{id}','CategoryController@restore')->name('category.restore');
Route::post('post-category-delete/{id}','CategoryController@delete')->name('category.delete');

//Route::get('post-category-unpublished/{id}', [App\Http\Controllers\CategoryController::class, 'unpublishedCategory'])->name('category.unpublished');

//Tag Routes
Route::resource('tag', TagController::class);

Route::get('tag-unpublished/{id}', 'TagController@unpublishedTag')->name('tag.unpublished');
Route::get('tag-published/{id}', 'TagController@publishedTag')->name('tag.published');

Route::get('tag-edit/{id}','TagController@edit');
Route::post('tag-update','TagController@update')->name('tag.update');

//Post Route
Route::resource('post',PostController::class);

Route::get('post-unpublished/{id}', 'PostController@unpublishedPost')->name('post.unpublished');
Route::get('post-published/{id}', 'PostController@publishedPost')->name('post.published');

Route::get('post-edit/{id}','PostController@edit');
Route::post('post-update','PostController@update')->name('post.update');
