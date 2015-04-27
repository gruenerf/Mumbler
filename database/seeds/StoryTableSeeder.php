<?php

use Illuminate\Database\Seeder;
use App\Story;

class StoryTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('stories')->delete();

		Story::create(['title' => 'Story 1', 'user_id' => '3']);
		Story::create(['title' => 'Story 2', 'user_id' => '1']);
		Story::create(['title' => 'Story 3', 'user_id' => '2']);
	}

}