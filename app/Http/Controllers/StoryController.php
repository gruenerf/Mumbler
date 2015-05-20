<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\StoryRequest;
use App\Http\Controllers\Controller;
use App\Story;

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

		if ($story->save())
		{
			\Session::flash("flash_message", "Story successfully created.");
			return redirect("/");
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
		return Story::find($id);
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
		//
	}

}
