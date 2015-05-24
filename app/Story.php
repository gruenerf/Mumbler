<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stories';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'hashtag', 'user_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['user_id'];

	/**
	 * Set the user_id attribute
	 *
	 * @param $id
	 */
	public function setUserIdAttribute($id)
	{
		$this->attributes['user_id'] = $id;
	}

	/**
	 * Gets all posts associated with story
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function posts()
	{
		return $this->belongsToMany('App\Post');
	}

}
