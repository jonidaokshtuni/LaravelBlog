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

Route::get('post', function () {
    return view('user.post');
})->name('post');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/dashboard','AdminController@editing' )->middleware('admin');

Route::get('user/dashboard','UserController@profileEditing' )->middleware('users');

Route::get('admin/post', function () {
    return view('admin.post.post');
});