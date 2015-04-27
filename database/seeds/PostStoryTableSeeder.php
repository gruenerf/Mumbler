<?php

use Illuminate\Database\Seeder;
use App\PostStory;

class PostStoryTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('post_stories')->delete();

		PostStory::create(['post_id' => '1','story_id' => '3']);
		PostStory::create(['post_id' => '1','story_id' => '1']);
		PostStory::create(['post_id' => '1','story_id' => '2']);
		PostStory::create(['post_id' => '2','story_id' => '1']);
		PostStory::create(['post_id' => '2','story_id' => '2']);
		PostStory::create(['post_id' => '2','story_id' => '3']);
		PostStory::create(['post_id' => '3','story_id' => '1']);
		PostStory::create(['post_id' => '3','story_id' => '2']);
		PostStory::create(['post_id' => '3','story_id' => '3']);
	}

}