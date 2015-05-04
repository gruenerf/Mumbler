<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\PostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

use App\Post;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{

	/**
	 * @return $this
	 */
	public function index()
	{
		$postArray = Post::latest()->get();

		return view('post.index')->with('postArray', $postArray);
	}

	/**
	 * @param $id
	 * @return $this
	 */
	public function show($id)
	{
		$post = Post::findOrFail($id);

		return view('post.show')->with('post', $post);
	}

	/**
	 * @param $media_content
	 */
	public function renderMediacontent($media_content)
	{

	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		return view('post.create');
	}

	/**
	 * @param PostRequest $request
	 * @return RedirectResponse|Redirector
	 */
	public function store(PostRequest $request)
	{
		$post = new Post($request->all());
		// Todo update to current user
		$post->setUserIdAttribute(1);

		$post->save();

		return redirect('post');
	}

	public function edit($id)
	{
		$post = Post::findOrFail($id);
		return view('post.edit')->with('post', $post);
	}

	public function update($id, PostRequest $request)
	{

		$post = Post::findOrFail($id);

		$post->update($request->all());

		return redirect('post/'.$id);
	}
}