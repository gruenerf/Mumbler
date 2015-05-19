<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\Post;
use Illuminate\Http\Request;

class HashtagController extends Controller
{

	public function index()
	{

	}

	public function show($hashtag)
	{
		$postArray = Post::where('hashtag', '=', $hashtag)->paginate(5);

		if(Input::get('page')) {
			return $postArray;
		} else {
			return view('hashtag.show')->with('postArray' , $postArray);
		}
	}

}
