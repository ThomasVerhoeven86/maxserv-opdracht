<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        
		DB::table('users')->insert([
			'id' => 1,
			'name' => 'Bob',
			'email' => 'test@test.nl',
			// password = password123
			'password' => '$2y$10$T9qcqTaHxBUe5nrAH05zfeLtLXYvGFx0gPjRxBXN0u5iYHzc2MAOy'
			// 'timestamp' => date('Y-m-d'),
			// 'updated_at' => date('Y-m-d'),
			// 'created_at' => date('Y-m-d')
		]);
		
		DB::table('users')->insert([
			'id' => 2,
			'name' => 'Lisa',
			'email' => 'email@email.nl',
			// password = wachtwoord123
			'password' => '$2y$10$u5jZE94zlo4qJzVBpkqkqeMADjyoISAuJYfHokIjiPN7H4TJmJlba'
			// 'timestamp' => date('Y-m-d'),
			// 'updated_at' => date('Y-m-d'),
			// 'created_at' => date('Y-m-d')
		]);
		
    }
}
