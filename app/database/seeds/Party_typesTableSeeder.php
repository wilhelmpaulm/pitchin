<?php

class Party_typesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('party_types')->truncate();

		$party_types = array(
                    ["name"=>"party","description"=>"small gathering of friends"],
                    ["name"=>"lecture","description"=>"an educational talk to an audience, esp. to students in a university or college"],
                    ["name"=>"seminar","description"=>"a conference or other meeting for discussion or training"],
                    ["name"=>"pot-luck","description"=>"A free contribution event"],
		);

		// Uncomment the below to run the seeder
		 DB::table('party_types')->insert($party_types);
	}

}
