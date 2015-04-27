<?php

use Illuminate\Database\Seeder;
use App\PostStory;

class PostStoryTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('post_stories')->delete();

		PostStory::create(['1','1']);
		PostStory::create(['1','2']);
		PostStory::create(['1','3']);
		PostStory::create(['2','1']);
		PostStory::create(['2','2']);
		PostStory::create(['2','3']);
		PostStory::create(['3','1']);
		PostStory::create(['3','2']);
		PostStory::create(['3','3']);
	}

}