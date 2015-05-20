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

// Welcome
Route::get('/', array('as' => 'home', 'uses' => 'WelcomeController@index'));
Route::get('home', 'WelcomeController@index');

// Mediacontent
Route::get('mediacontent/{id}', 'MediaContentController@show');

// Post
Route::resource('post', 'PostController');
//Route::get('post/user/{id}', 'PostController');

// Hashtag
Route::get('hashtag', function(){
	return redirect()->route('home');
});
Route::get('hashtag/{hashtag}', 'HashtagController@show');

// Search
Route::get('search/{term}', 'SearchController@show');
Route::get('search', function(){
	return redirect()->route('home');
});

Route::get('profile/{username}', 'UserController@show');

/*Route::get('story', 'StoryController@index');
Route::get('story/create', 'StoryController@create');
Route::get('story/{id}', 'StoryController@show');*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
