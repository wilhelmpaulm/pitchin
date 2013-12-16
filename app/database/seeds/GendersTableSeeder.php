<?php

class GendersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('genders')->truncate();

		$genders = array(
                    ["name" => "male"],
                    ["name" => "female"],
		);

		// Uncomment the below to run the seeder
		 DB::table('genders')->insert($genders);
	}

}
