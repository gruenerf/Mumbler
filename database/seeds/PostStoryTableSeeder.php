<?php

use Illuminate\Database\Seeder;
use App\Story;

class PostsStoriesTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('posts_stories')->delete();

		$posts_stories = array(
			['post_id' => '0', 'story_id' => '0'],
			['post_id' => '1', 'story_id' => '1'],
			['post_id' => '2', 'story_id' => '2']
		);

		//// Uncomment the below to run the seeder
		DB::table('posts_stories')->insert($posts_stories);
	}

}