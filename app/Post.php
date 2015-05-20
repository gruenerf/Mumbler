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
	protected $fillable = ['hashtag', 'text'];

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
	 * Set Media Content id
	 *
	 * @param $id
	 */
	public function setMediaContentId($id)
	{
		$this->attributes['media_content_id'] = $id;
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

	/**
	 * A User has MediaContent
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function mediacontent()
	{
		return $this->hasOne('App\MediaContent','id', 'media_content_id');
	}

}
