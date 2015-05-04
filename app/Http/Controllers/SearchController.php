<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;

class SearchController extends Controller
{

	public function show($term)
	{
		$postArray = Post::where('hashtag', '=', $term)->get();

		return view('hashtag.show')->with('postArray' , $postArray);
	}

}
