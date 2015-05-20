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
		//TODO: Uncomment this if welcome screen should only be shown to loggedout users $this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return $this
	 */
	public function index()
	{
		$hashtagArray = Post::select('hashtag')->groupBy('hashtag')->take(20)->get();

		return view('page.welcome')->with('hashtagArray', $hashtagArray);
	}

}
