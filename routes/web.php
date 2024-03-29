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
Route::get('/', 'HomeController@index')->name('home');
Route::get('send', 'HomeController@sendNotification');
Route::get('/plans', 'PlanController@index')->name('plans.index');
Route::get('/plan/{plan}', 'PlanController@show')->name('plans.show');
Route::post('/subscription', 'SubscriptionController@store')->name('subscription.store');

Route::group(['middleware'=>'visitors'], function(){
    Route::get('/register', 'RegisterController@register');
    Route::post('/register', 'RegisterController@postRegister');
    
    Route::get('/login', 'LoginController@login');
    Route::post('/login', 'LoginController@postLogin');
});



Route::post('/logout', 'LoginController@logout');

//user routes
Route::get('post/{post}','UserPostController@index')->name('post');
Route::get('/user/posts', 'UserPostController@showPosts')->name('posts');
Route::post('/like','UserPostController@likePost')->name('like');
Route::get('user/dashboard','UserController@profileEditing' )->middleware('users');


//admin routes
Route::get('admin/dashboard','AdminController@editing' )->middleware('admin');

Route::resource('admin/user','CreatingUsersController');

//post routes
Route::resource('admin/post', 'PostController');
//Route::get('admin/post/getDatatable','PostController@getDatatable')->name('post.getDatatable');



//tag routes
Route::resource('admin/tag', 'TagController');
//Route::get('admin/tag/get_datatable','TagController@get_datatable')->name('tag.get_datatable');

//category routes
Route::resource('admin/category', 'CategoryController');
//Route::get('admin/category/get_datatable','CategoryController@get_datatable')->name('category.get_datatable');

Route::get('email', 'EmailController@sendEmail');