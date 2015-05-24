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
Route::get('hashtag/{hashtag}', 'HashtagController@show');

// Story
Route::resource('story', 'StoryController');
Route::post("story/addToStory", "StoryController@addToStory");

// User
Route::get("{username}", "UserController@show");

// Search
Route::get('search/{term}', 'SearchController@show');


Route::get('profile/{username}', 'UserController@show');

// Authentication
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
