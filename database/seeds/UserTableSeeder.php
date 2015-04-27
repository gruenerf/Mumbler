<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->delete();

		$users = array(
			[1, 'name' => 'User 1', 'email' => 'asdasdasd@asdasd.com', 'password' => 'asdasdasdasd'],
			[2, 'name' => 'User 2', 'email' => 'asdasdasd@asdasd.com', 'password' => 'asdasdasdasd'],
			[3, 'name' => 'User 3', 'email' => 'asdasdasd@asdasd.com', 'password' => 'asdasdasdasd']
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}