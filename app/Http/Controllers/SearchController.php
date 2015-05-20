<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;

use App\Post;
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
		$postArray = Post::where('hashtag', 'LIKE', '%'.$term.'%')->orWhere('text', 'LIKE', '%'.$term.'%')->paginate(1);

		if(Input::get('page')){
			return $postArray;
		}else{
			return view('search.show', array('postArray' => $postArray, 'term' => $term));
		}
	}

}
