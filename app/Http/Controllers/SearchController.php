<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;

use App\Post;
use App\Story;
use Illuminate\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
	/**
	 * Display the specified resource.
	 *
	 * @param $term
	 * @return \Illuminate\View\View
	 */
	public function show($term)
	{
		$postArray = Post::where('hashtag', 'LIKE', '%'.$term.'%')->orWhere('text', 'LIKE', '%'.$term.'%')->get();

		$stories = Story::where('hashtag', 'LIKE', '%'.$term.'%')->orWhere('title', 'LIKE', '%'.$term.'%')->get();

		if (\Auth::user()) {
			$usersStories = Story::where("user_id", "=", \Auth::user()->id)->orderBy("id", "DESC")->get();
		} else {
			$usersStories = [];
		}

		if (Input::get('page')) {
			return $postArray;
		} else {
			return view('search.show', array(
				'postArray' => $postArray,
				'stories' => $stories,
				'usersStories' => $usersStories,
				'term' => $term
			));
		}
	}

}
