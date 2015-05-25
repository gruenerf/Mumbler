<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Http\Request;


class WelcomeController extends Controller {

	/**
	 * Create a new controller instance.
	 */
	public function __construct()
	{

	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return $this
	 */
	public function index()
	{
		$hashtagArray = Post::select('hashtag')->groupBy('hashtag')->take(8)->get();

		return view('page.welcome')->with('hashtagArray', $hashtagArray);
	}

}
