<?php

use Illuminate\Database\Seeder;

class ToDoItemsTableSeeder extends Seeder
{
    public function run()
    {
        
	// Bob
		DB::table('to_do_items')->insert([
			'name' => 'Plunderen',
			'content' => 'De schatkist plunderen',
			'edit_date' => '2013-06-15 20:30:00',
			'start_date' => '1995-05-13',
			'end_date' => '2020-01-01',
			'finished' => '0',
			'author' => 'Bob',
			'user_id' => '1'
		]);
		
		DB::table('to_do_items')->insert([
			'name' => 'Varen',
			'content' => 'Varen naar de schatkist',
			'edit_date' => '2019-01-30 05:30:00',
			'start_date' => '1988-11-28',
			'end_date' => '2003-02-18',
			'finished' => '1',
			'author' => 'Bob',
			'user_id' => '1'
		]);
		
		DB::table('to_do_items')->insert([
			'name' => 'Schatkist opgraven',
			'content' => 'De grote schatkist vol met geld opgraven',
			'edit_date' => '2016-06-15 18:03:23',
			'start_date' => '2006-10-09',
			'end_date' => '2021-12-12',
			'finished' => '1',
			'author' => 'Bob',
			'user_id' => '1'
		]);
		
		DB::table('to_do_items')->insert([
			'name' => 'Aanvallen',
			'content' => 'Het aanvallen van de vijand',
			'edit_date' => '1992-02-07 06:38:42',
			'start_date' => '2011-07-12',
			'end_date' => '2018-09-24',
			'finished' => '0',
			'author' => 'Bob',
			'user_id' => '1'
		]);
		
	// Lisa
		DB::table('to_do_items')->insert([
			'name' => 'Mars verkennen',
			'content' => 'Verkennen van de oppervlakte van mars',
			'edit_date' => '1966-11-28 10:30:00',
			'start_date' => '1965-04-11',
			'end_date' => '1971-06-15',
			'finished' => '1',
			'author' => 'Lisa',
			'user_id' => '2'
		]);
		
		DB::table('to_do_items')->insert([
			'name' => 'Pluto verkennen',
			'content' => 'Een tunnel graven naar de kern van pluto',
			'edit_date' => '1981-01-02 09:30:00',
			'start_date' => '1975-07-12',
			'end_date' => '1979-09-24',
			'finished' => '0',
			'author' => 'Lisa',
			'user_id' => '2'
		]);
		
		DB::table('to_do_items')->insert([
			'name' => 'Wereld veroveren',
			'content' => 'Alleen tijdens een volle maan',
			'edit_date' => '2021-04-06 12:12:12',
			'start_date' => '2019-03-09',
			'end_date' => '2023-08-21',
			'finished' => '1',
			'author' => 'Lisa',
			'user_id' => '2'
		]);
		
		DB::table('to_do_items')->insert([
			'name' => 'Plasmareactor uitvinden',
			'content' => 'Plasmareactor uitvinden om mobiele telefoons mee op te laden',
			'edit_date' => '1993-02-07 15:15:00',
			'start_date' => '1999-12-12',
			'end_date' => '2001-11-03',
			'finished' => '1',
			'author' => 'Lisa',
			'user_id' => '2'
		]);
		
		DB::table('to_do_items')->insert([
			'name' => 'Slapen',
			'content' => 'Iedereen wordt moe',
			'edit_date' => '2019-08-25 22:19:53',
			'start_date' => '2019-08-14',
			'end_date' => '2019-08-24',
			'finished' => '1',
			'author' => 'Lisa',
			'user_id' => '2'
		]);
		
    }
}
