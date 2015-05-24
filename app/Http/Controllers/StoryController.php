<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\StoryRequest;
use App\Http\Controllers\Controller;
use App\Post;
use App\Story;
use App\PostStory;

use Illuminate\Http\Request;

class StoryController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("story.show");
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("story.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoryRequest $request)
	{
		$story = new Story();

		$story->user_id = \Auth::user()->id;
		$story->title = $request->title;
		$story->hashtag = $request->hashtag;

		if ($story->save())
		{
			\Session::flash("flash_message", "Story created.");
			return redirect()->back();
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param 	int  $id
	 * @return 	Response
	 */
	public function show($id)
	{
		$story = Story::find($id);

		$storyPosts = PostStory::where("story_id", "=", $story->id)->get();

		if (! empty($storyPosts)) {

			$posts = [];
			foreach($storyPosts as $post) {
				$posts[] = $post->post_id;
			}

			$posts = Post::whereIn("id", $posts)->orderBy("updated_at", "DESC")->get();

			if (\Auth::user()) {
				$usersStories = Story::where("user_id", "=", \Auth::user()->id)->orderBy("id", "DESC")->get();
			} else {
				$usersStories = [];
			}
			
			return view("story.show")->with([
				"posts" => $posts,
				"usersStories" => $usersStories
			]);
		}

		return view("story.show");
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param 	int  $id
	 * @return 	Response
	 */
	public function edit($id)
	{

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, StoryUpdateRequest $request)
	{
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$story = Story::findOrFail($id);

		if($story->user_id === Auth::id())
		{
			$story->delete();
			\Session::flash("flash_message", "Story deleted.");
		}

		return redirect()->route('story.index');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function addToStory(Request $request)
	{
		$story = Story::findOrFail($request->story);
		$post = Post::findOrFail($request->postId);

		if ($post->hashtag == $story->hashtag)
		{
			$postStory = new PostStory();
			$postStory->post_id = $request->postId;
			$postStory->story_id = $request->story;

			if ($postStory->save()) {
				\Session::flash("flash_message", "Added to story.");
				return redirect()->back();
			}

			return redirect()->back();
		}

		\Session::flash("flash_message", "Post hashtag has to be the same as the story hashtag.");
		return redirect()->back();
	}

}
