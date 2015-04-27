<?php

use Illuminate\Database\Seeder;
use App\Post_Story;

class PostStoryTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('post_stories')->delete();

		Post_Story::create(['1','1']);
		Post_Story::create(['1','2']);
		Post_Story::create(['1','3']);
		Post_Story::create(['2','1']);
		Post_Story::create(['2','2']);
		Post_Story::create(['2','3']);
		Post_Story::create(['3','1']);
		Post_Story::create(['3','2']);
		Post_Story::create(['3','3']);
	}

}