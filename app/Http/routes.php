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

Route::get('/', array('as' => 'home', 'uses' => 'WelcomeController@index'));
Route::get('home', 'WelcomeController@index');

Route::resource('post', 'PostController');
//Route::get('post/user/{id}', 'PostController');

Route::get('hashtag', function(){
	return redirect()->route('home');
});
Route::get('hashtag/{hashtag}', 'HashtagController@show');

Route::resource('story', 'StoryController');

Route::get('search/{term}', 'SearchController@show');
Route::get('search', function(){
	return redirect()->route('home');
});

//Route::get('profile/{username}', 'UserController@show');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
