<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Http\Request;

class HashtagController extends Controller
{

	public function index()
	{
		$hashtagArray = Post::select('hashtag')->groupBy('hashtag')->get()->toArray();

		return view('hashtag.index')->with('hashtagArray' , $hashtagArray);
	}

	public function show($hashtag)
	{
		$postArray = Post::where('hashtag', '=', $hashtag)->get();

		return view('hashtag.show')->with('postArray' , $postArray);
	}

}
