<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MediaContent;
use Illuminate\Http\Request;

class MediaContentController extends Controller {

	/**
	 * Returns the Mediacontent Json
	 *
	 * @param $id
	 * @return \Illuminate\Support\Collection|null|static
	 */
	public function show($id)
	{
		return MediaContent::find($id);
	}

}
