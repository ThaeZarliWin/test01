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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('layouts/app');
});

Route::get('/post_list', function () {
    return view('posts/post_list');
});
Route::get('/create_post', function () {
    return view('posts/create_post');
});
Route::get('/create_post_confirm', function () {
    return view('posts/create_post_confirm');
});
Route::get('/update_post', function () {
    return view('posts/update_post');
});
Route::get('/update_post_confirm', function () {
    return view('posts/update_post_confirm');
});
Route::get('/create_user', function () {
    return view('users/create_user');
});
Route::get('/create_user_confirm', function () {
    return view('users/create_user_confirm');
});
Route::get('/user_list', function () {
    return view('users/user_list');
});
Route::get('/update_user', function () {
    return view('users/update_user');
});
Route::get('/update_user_confirm', function () {
    return view('users/update_user_confirm');
});
Route::get('/change_password', function () {
    return view('users/change_password');
});
Route::get('/upload_csv_screen', function () {
    return view('users/upload_csv_screen');
});
Route::get('/user_profile', function () {
    return view('users/user_profile');
});
