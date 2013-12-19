<?php

class BadgesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('badges')->truncate();

		$badges = array(
                    ["id"=>"1", "title"=>"initiate", "conditions"=>"have the courage to sign up and log in", "picture"=>"badge_1.png"],
                    ["id"=>"2", "title"=>"early bird", "conditions"=>"be the first to join a party", "picture"=>"badge_2.png"],
                    ["id"=>"3", "title"=>"eventologist", "conditions"=>"start your first event", "picture"=>"badge_3.png"],
                    ["id"=>"4", "title"=>"the waterboy", "conditions"=>"bring drinks to a party", "picture"=>"badge_4.png"],
                    ["id"=>"5", "title"=>"the moon and red spoons", "conditions"=>"bring utensils to a party", "picture"=>"badge_5.png"],
                    ["id"=>"6", "title"=>"home is where the venue is", "conditions"=>"provide the venue", "picture"=>"badge_6.png"],
                    ["id"=>"7", "title"=>"pentagon cupcake", "conditions"=>"NSA on your pastries", "picture"=>"badge_7.png"],
                    ["id"=>"8", "title"=>"pizza guy", "conditions"=>"bring a lot of meals", "picture"=>"badge_8.png"],
                    ["id"=>"9", "title"=>"that purple snow", "conditions"=>"look at that beauty", "picture"=>"badge_9.png"],
                    ["id"=>"10", "title"=>"light headed", "conditions"=>"provide the lighting and flashes", "picture"=>"badge_10.png"],
                    ["id"=>"11", "title"=>"flat features", "conditions"=>"provide the visuals", "picture"=>"badge_11.png"],
                    ["id"=>"12", "title"=>"be kind please rewind", "conditions"=>"bring movies and chick flicks", "picture"=>"badge_12.png"],
                    ["id"=>"13", "title"=>"alto", "conditions"=>"provide the tracks and beats", "picture"=>"badge_13.png"],
                    ["id"=>"14", "title"=>"like ikea", "conditions"=>"bring tables and or chairs to the event", "picture"=>"badge_14.png"],
                    ["id"=>"15", "title"=>"the gentleman", "conditions"=>"bring tea or coffee to the party", "picture"=>"badge_15.png"],
                    ["id"=>"16", "title"=>"wingman", "conditions"=>"bring alcoholic beverages to the event", "picture"=>"badge_16.png"],
		);

		// Uncomment the below to run the seeder
		 DB::table('badges')->insert($badges);
	}

}
