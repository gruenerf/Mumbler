<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaContent extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'media_contents';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['src'];

	/**
	 * Sets type of the media_content
	 *
	 * @param $type
	 */
	public function setType($type)
	{
		$this->attributes['type'] = $type;
	}

	/**
	 * One Media content belongs to a post
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function post() {
		return $this->belongsTo('App/Post');
	}
}
