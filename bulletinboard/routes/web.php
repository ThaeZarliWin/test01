<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'Post\PostController@show');


Auth::routes();
Route::group(['middleware' => ['preventback','auth']], function(){
    
    Route::get('/create_post','Post\PostController@create')->name('create_post');
    Route::post('/storePost', 'Post\PostController@store')->name('storePost');
    Route::any('/post_list','Post\PostController@show')->name('post_list');
    Route::post('/create_post_confirm','Post\PostController@createConfirm')->name('create_post_confirm');
    Route::get('/update_post/{id}','Post\PostController@edit')->name('update_post');
    Route::post('/update_post_confirm/{id}','Post\PostController@editConfirm')->name('update_post_confirm');
    Route::post('/updatePost/{id}','Post\PostController@update')->name('updatePost');
    Route::delete('/delete/{id}','Post\PostController@destroy')->name('delete');

    Route::get('/create_user', 'User\UserController@create')->name('create_user');
    Route::post('/create_user_confirm','User\UserController@createConfirm')->name('create_user_confirm');
    Route::post('/storeUser', 'User\UserController@store')->name('storeUser');
    Route::any('/user_list', 'User\UserController@show')->name('user_list');
    Route::get('/delete/{id}','User\UserController@destroy')->name('delete');
    Route::get('/update_user/{id}','User\UserController@edit')->name('update_user');
    Route::put('/update_user_confirm/{id}','User\UserController@editConfirm')->name('update_user_confirm');
    Route::post('/update/{id}','User\UserController@update')->name('update');
    Route::get('/password/{id}','User\UserController@password');
    Route::post('/passwordChange/{id}','User\UserController@changepassword');

    Route::get('upload','Post\PostController@uploadView');
    Route::post('import','Post\PostController@uploadFile');
    Route::get('export','Post\PostController@download');
    Route::get('/user_profile', function () {
        return view('users/user_profile');
    });
});

