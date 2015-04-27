<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->delete();

		User::create(['name' => 'User 1', 'email' => 'asdasdasd@asdasd.com', 'password' => 'asdasdasdasd']);
		User::create(['name' => 'User 2', 'email' => 'asdafddfdsd@asdasd.com', 'password' => 'asdasdasdasd']);
		User::create(['name' => 'User 3', 'email' => 'asdasdasasddsasd@asdasd.com', 'password' => 'asdasdasdasd']);

	}

}