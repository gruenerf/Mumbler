<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('home', 'WelcomeController@index');

Route::resource('post', 'PostController');
Route::get('post/user/{id}', 'PostController');

Route::get('hashtag', 'WelcomeController@index');
Route::get('hashtag/{hashtag}', 'HashtagController@show');

Route::post('search', 'SearchController@show');

Route::get('profile/{username}', 'UserController@show');

/*Route::get('story', 'StoryController@index');
Route::get('story/create', 'StoryController@create');
Route::get('story/{id}', 'StoryController@show');*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
