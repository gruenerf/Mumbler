<?php

use Illuminate\Database\Seeder;

class StoryTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('stories')->delete();

		$stories = array(
			[1, 'title' => 'Story 1', 'user_id' => '1'],
			[2, 'title' => 'Story 2', 'user_id' => '2'],
			[3, 'title' => 'Story 3', 'user_id' => '3'],
		);

		// Uncomment the below to run the seeder
		DB::table('stories')->insert($stories);
	}

}