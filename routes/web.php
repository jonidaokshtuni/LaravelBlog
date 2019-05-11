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
    return view('user.blog');
});

Route::group(['middleware'=>'visitors'], function(){
    Route::get('/register', 'RegisterController@register');
    Route::post('/register', 'RegisterController@postRegister');
    
    Route::get('/login', 'LoginController@login');
    Route::post('/login', 'LoginController@postLogin');
});



Route::post('/logout', 'LoginController@logout');

//user routes
Route::get('post', 'UserPostController@index')->name('post');
Route::get('user/dashboard','UserController@profileEditing' )->middleware('users');

//admin routes
Route::get('admin/dashboard','AdminController@editing' )->middleware('admin');

Route::resource('admin/user','CreatingUsersController');

//post routes
Route::resource('admin/post', 'PostController');

//tag routes
Route::resource('admin/tag', 'TagController');

//category routes
Route::resource('admin/category', 'CategoryController');
