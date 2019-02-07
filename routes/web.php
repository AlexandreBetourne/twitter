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

Route::group(['middleware' => ['web']] ,function(){
  Auth::routes();
});

Route::group(['middleware' => ['web', 'auth']] ,function(){
  Route::get('/', 'TimelineController@index')->name('home');

  Route::get('/profile', 'ProfileController@index')->name('profile');
  Route::post('/profile', 'ProfileController@post')->name('profile.post');

  Route::get('/api/all', 'ApiController@index')->name('tweets.get');
  Route::post('/api/all', 'ApiController@post')->name('tweet.post');
  Route::get('/api', 'ApiController@delete')->name('tweet.delete');;
});
