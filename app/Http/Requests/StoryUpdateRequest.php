<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Story;
use Auth;

class PostUpdateRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		$storyId = $this->route('story');

		return Story::where('id', $storyId)
			->where('user_id', Auth::id())->exists();
	}

	/**
	 * Set custom messages for the form validation errors.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'hashtag.singleword' => 'A hashtag has to be written as one word.'
		];
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title' => 'required',
			'hashtag' => 'required|min:3|singleword'
		];
	}

}
