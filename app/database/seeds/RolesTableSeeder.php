<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('roles')->truncate();

		$roles = array(
                    ["name"=>"host","description"=>"you're the master showman"],
                    ["name"=>"speaker","description"=>"no, not the ones you plug in the tv or your iPod"],
                    ["name"=>"planner","description"=>"you're the game maker!"],
                    ["name"=>"contributor","description"=>"It means you're not a freeloader"],
                    ["name"=>"freeloader","description"=>"why are you even attending?"],
                    ["name"=>"guest","description"=>"you're not that honorable to be called guest of honor"],
                    ["name"=>"guest of honor","description"=>"you're more honorable than some guests, booo plain guests!"],
                    ["name"=>"usher","description"=>"pls, you dont have to sing and dance unless youre good"],
                    ["name"=>"benefactor","description"=>"coz you have a lot of money to spend"],
                    ["name"=>"the wilhelm paul","description"=>"you have to be insane and crazy at the same time and still be able to surprise people when you get serious"],
		);

		// Uncomment the below to run the seeder
		 DB::table('roles')->insert($roles);
	}

}
