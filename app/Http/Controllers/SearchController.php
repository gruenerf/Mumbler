<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;

use App\Post;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{

	// TODO make it possible that term can be passed by url parameter
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
