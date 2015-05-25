<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('posts')->delete();

		Post::create(['hashtag' => 'Hashtag1', 'text' => 'Text 1', 'media_content_id'=>'1', 'user_id' => '3']);
		Post::create(['hashtag' => 'Hashtag21', 'text' => 'Text 2', 'media_content_id'=>'2', 'user_id' => '1']);
		Post::create(['hashtag' => 'Hashtag32', 'text' => 'Text 3', 'media_content_id'=>'3', 'user_id' => '2']);
		Post::create(['hashtag' => 'Hashtag121', 'text' => 'Text 1', 'media_content_id'=>'1', 'user_id' => '3']);
		Post::create(['hashtag' => 'Hashtag2', 'text' => 'Text 2', 'media_content_id'=>'2', 'user_id' => '1']);
		Post::create(['hashtag' => 'Hashtag31', 'text' => 'Text 3', 'media_content_id'=>'3', 'user_id' => '2']);
		Post::create(['hashtag' => 'Hashtag12', 'text' => 'Text 1', 'media_content_id'=>'1', 'user_id' => '3']);
		Post::create(['hashtag' => 'Hashtag2', 'text' => 'Text 2', 'media_content_id'=>'2', 'user_id' => '1']);
		Post::create(['hashtag' => 'Hashtag32', 'text' => 'Text 3', 'media_content_id'=>'3', 'user_id' => '2']);
		Post::create(['hashtag' => 'Hashtag1', 'text' => 'Text 1', 'media_content_id'=>'1', 'user_id' => '3']);
		Post::create(['hashtag' => 'Hashtag22', 'text' => 'Text 2', 'media_content_id'=>'2', 'user_id' => '1']);
		Post::create(['hashtag' => 'Hashtag31', 'text' => 'Text 3', 'media_content_id'=>'3', 'user_id' => '2']);
	}

}