<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_Story extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'post_stories';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['post_id', 'story_id'];

}
