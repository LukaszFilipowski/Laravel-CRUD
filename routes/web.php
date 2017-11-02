<?php

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

Route::get('/home', 'HomeController@index')->name('home');

//ADMIN ROUTES
Route::prefix('admin')->group(function () {
    // login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    
    Route::middleware(['auth'])->group(function() {
        
        Route::get('pages', 'Admin\PagesController@index')->name('admin.pages.index');
        Route::get('pages/create', 'Admin\PagesController@create')->name('admin.pages.create');
        Route::post('pages/create', 'Admin\PagesController@store')->name('admin.pages.store');
        Route::get('pages/{id}/edit', 'Admin\PagesController@edit')->name('admin.pages.edit');
        Route::put('pages/{id}/edit', 'Admin\PagesController@store')->name('admin.pages.update');
        Route::get('pages/{id}/delete', 'Admin\PagesController@delete')->name('admin.pages.delete');
        
        Route::get('instas', 'Admin\InstaController@index')->name('admin.instas.index');
        Route::get('instas/create', 'Admin\InstaController@create')->name('admin.instas.create');
        Route::post('instas/create', 'Admin\InstaController@store')->name('admin.instas.store');
        Route::get('instas/{id}/edit', 'Admin\InstaController@edit')->name('admin.instas.edit');
        Route::put('instas/{id}/edit', 'Admin\InstaController@store')->name('admin.instas.update');
        Route::get('instas/{id}/delete', 'Admin\InstaController@delete')->name('admin.instas.delete');
        
        Route::get('blog', 'Admin\BlogController@index')->name('admin.blog.index');
        Route::get('blog/create', 'Admin\BlogController@create')->name('admin.blog.create');
        Route::post('blog/create', 'Admin\BlogController@store')->name('admin.blog.store');
        Route::get('blog/{id}/edit', 'Admin\BlogController@edit')->name('admin.blog.edit');
        Route::put('blog/{id}/edit', 'Admin\BlogController@store')->name('admin.blog.update');
        Route::get('blog/{id}/delete', 'Admin\BlogController@delete')->name('admin.blog.delete');
        
        Route::get('artists', 'Admin\ArtistController@index')->name('admin.artists.index');
        Route::get('artists/create', 'Admin\ArtistController@create')->name('admin.artists.create');
        Route::post('artists/create', 'Admin\ArtistController@store')->name('admin.artists.store');
        Route::get('artists/{id}/edit', 'Admin\ArtistController@edit')->name('admin.artists.edit');
        Route::put('artists/{id}/edit', 'Admin\ArtistController@update')->name('admin.artists.update');
        Route::get('artists/{id}/delete', 'Admin\ArtistController@delete')->name('admin.artists.delete');
        
    });
});

// storage
Route::get('public/images/{folder}/{file}', 'StorageController@link')->where('file', '[A-Za-z0-9\-\_\.]+');
Route::get('easter', 'StorageController@easter')->name('easter');
