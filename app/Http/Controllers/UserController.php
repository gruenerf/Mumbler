<?php

namespace App\Http\Controllers;

use App\User;
use App\Story;
use App\Post;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UserController extends Controller {

	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show']]);
	}

	/**
	 *
	 */
	public function index()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param $name
	 * @return $this
	 */
	public function show($name)
	{
		$user = User::where('name', '=', $name)->first();

		if ($user == null) { return redirect()->back(); }

		if (\Auth::user()) {
			$usersStories = Story::where("user_id", "=", \Auth::user()->id)->orderBy("id", "DESC")->get();
		} else {
			$usersStories = [];
		}
		
		$stories = Story::where("user_id", "=", $user->id)->orderBy("id", "DESC")->get();
			
		$posts = Post::where("user_id", "=", $user->id)->orderBy("id", "DESC")->get();

		return view('user.test')->with([
			"user" => $user,
			"stories" => $stories,
			"posts" => $posts,
			"usersStories" => $usersStories
		]);
	}

}
