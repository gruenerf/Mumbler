<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->delete();

		User::create(['name' => 'User1', 'password' => 'asdasdasdasd']);
		User::create(['name' => 'User2', 'password' => 'asdasdasdasd']);
		User::create(['name' => 'User3', 'password' => 'asdasdasdasd']);

	}

}