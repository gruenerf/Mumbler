<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\Post;
use App\Story;
use Illuminate\Http\Request;

class HashtagController extends Controller
{

	/**
	 * Display the specified resource.
	 *
	 * @param $hashtag
	 * @return $this
	 */
	public function show($hashtag)
	{
		$postArray = Post::where('hashtag', '=', $hashtag)->paginate(5);

		if (\Auth::user()) {
			$usersStories = Story::where("user_id", "=", \Auth::user()->id)->orderBy("id", "DESC")->get();
		} else {
			$usersStories = [];
		}
		

		if (Input::get('page')) {
			return $postArray;
		} else {
			return view('hashtag.show')->with(['posts' => $postArray, "usersStories" => $usersStories]);
		}
	}

}
