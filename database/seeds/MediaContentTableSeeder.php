<?php

use App\MediaContent;
use Illuminate\Database\Seeder;
use App\Post;

class MediaContentTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('media_contents')->delete();

		MediaContent::create(['src' => 'uploads/1234.mp4', 'type' => 'video']);
		MediaContent::create(['src' => 'uploads/23916.png', 'type' => 'image']);
		MediaContent::create(['src' => 'uploads/1234.mp4', 'type' => 'video']);
	}

}