<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MediaContent;
use App\Post;
use App\Story;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller {

	/**
	 * Create a new controller instance.
	 */
	public function __construct()
	{
		$this->middleware('auth',['except' => ['index','show']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$postArray = Post::latest()->paginate(5);
		
		if (\Auth::user()) {
			$usersStories = Story::where("user_id", "=", \Auth::user()->id)->orderBy("id", "DESC")->get();
		} else {
			$usersStories = [];
		}
	
		if(Input::get('page')){
			return $postArray;
		}else{
			return view('post.index')->with(['posts' => $postArray, "usersStories" => $usersStories]);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('post.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 *
	 * TODO: possibility to add userfolder
	 */
	public function store(PostRequest $request)
	{
		$post = new Post();

		if ($request->hasFile('media_content'))
		{
			if ($request->file('media_content')->isValid())
			{
				$extension = $request->file('media_content')->getClientOriginalExtension(); # get image extension

				$fileName = rand(111111111, 999999999) . '.' . $extension; # rename image

				while(file_exists('uploads/'.$fileName)){
					$fileName = rand(111111111, 999999999) . '.' . $extension; # rename image
				}

				if ( $request->file('media_content')->move("uploads", $fileName) )
				{
					// Make new MediaContent
					$media_content = new MediaContent();
					$media_content->src = 'uploads/'.$fileName;

					// Define the type of the content
					if($extension === 'mp4'){
						$media_content->setType('video');
					}else{
						$media_content->setType('image');
					}

					$media_content->save();

					// Save MediaContent id in post
					$post->setMediaContentId($media_content->id);
				}
			}
		}

		$post->text = $request['text'];
		$post->hashtag = $request['hashtag'];
		$post->setUserIdAttribute(Auth::user()->id);

		$post->save();

		return redirect()->route('post.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('post.show')->with('post' , Post::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::findOrFail($id);
		return view('post.edit')->with('post', $post);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, PostUpdateRequest $request)
	{
		$post = Post::findOrFail($id);

		$post->update($request->all());

		return redirect()->route('post.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::findOrFail($id);

		if($post->user_id == Auth::id())
		{
			$post->delete();
			\Session::flash("flash_message", "Post deleted.");
		}
		// return redirect()->route('post.index');
	}

}
