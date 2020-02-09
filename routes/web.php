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

// login 
Route::post('/login', 'LoginController@login');
Route::get('/login', 'LoginController@login');
Route::post('/signup', 'SignUpController@SignUp');
Route::get('/', 'LoginController@login');
//Home
Route::get('/blood/{type}', 'HomeController@posts');
Route::get('/home', 'HomeController@home');
Route::post('/home', 'HomeController@home');
Route::get('/logout', 'HomeController@logout');
Route::get('/profile', 'HomeController@UpdateProfile');
Route::post('/profile', 'HomeController@UpdateProfile');
Route::get('/settings', 'HomeController@Settings');
Route::post('/settings', 'HomeController@Settings');


// posts
Route::post('/add_comment', 'PostsController@add_comment');
Route::post('/add_post', 'PostsController@add_post');
Route::post('/update_post', 'PostsController@update_post');
Route::post('/delete_post', 'PostsController@delete_post');
Route::post('/notifi', 'AjaxNotifiController@notifi');