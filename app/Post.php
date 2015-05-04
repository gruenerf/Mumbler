<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'media_content', 'hashtag', 'text'];

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
	 * A post belongs to a user.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * Gets all stories associated with post
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function stories()
	{
		return $this->belongsToMany('App\Story');
	}

}
