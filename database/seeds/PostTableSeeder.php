<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('posts')->delete();

		Post::create(['title' => 'Post 1', 'hashtag' => 'Hashtag 1', 'text' => 'Text 1', 'media_content'=>'Content 1', 'user_id' => '3']);
		Post::create(['title' => 'Post 2', 'hashtag' => 'Hashtag 2', 'text' => 'Text 2', 'media_content'=>'Content 1', 'user_id' => '1']);
		Post::create(['title' => 'Post 3', 'hashtag' => 'Hashtag 3', 'text' => 'Text 3', 'media_content'=>'Content 1', 'user_id' => '2']);
	}

}