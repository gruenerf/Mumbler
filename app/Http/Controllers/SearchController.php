<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;

use App\Post;

class SearchController extends Controller
{

	// TODO make it possible that term can be passed by url parameter
	public function show(SearchRequest $request)
	{
		$term = $request->term;
		$postArray = Post::where('hashtag', 'LIKE', '%'.$term.'%')->orWhere('text', 'LIKE', '%'.$term.'%')->get();

		dd($postArray);
		return $postArray;
	}

}
