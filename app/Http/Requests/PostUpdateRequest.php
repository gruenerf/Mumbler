<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Post;
use Auth;

class PostUpdateRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 * @return bool
	 */
	public function authorize()
	{
		$postId = $this->route('post');

		return Post::where('id', $postId)
			->where('user_id', Auth::id())->exists();
	}


	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'media_content' => 'required|mimes:bmp,jpeg,jpg,png,gif,mp4',
			'text' => 'required',
			'hashtag' => 'required|min:3'
		];
	}

}
