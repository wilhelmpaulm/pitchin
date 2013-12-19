<?php

class ContributionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('contributions')->truncate();

		$contributions = array(
                    ["name"=>"meals","description"=>"Meals or viands"],
                    ["name"=>"snacks","description"=>"finger foods or chips"],
                    ["name"=>"beverages","description"=>"soda, water or juices"],
                    ["name"=>"alcoholic","description"=>"wines, mixes and beers"],
                    ["name"=>"coffee/tea","description"=>"yep, coffee and tea that's about it"],
                    ["name"=>"pastries","description"=>"Whole, Half wheat and crazy bread included"],
                    ["name"=>"dessert","description"=>"Ice cream and excitement. . . sugar"],
                    ["name"=>"utensils","description"=>"plates, forks, spoons, knives"],
                    ["name"=>"sounds","description"=>"Yep not just food"],
                    ["name"=>"lights","description"=>"san a dadalhin ng 20 pesos mo?"],
                    ["name"=>"tables/chairs","description"=>"tables and chairs kasi nga party"],
                    ["name"=>"venue","description"=>"natural hindi ka mag bubuhat, either ikaw magbabayad or iakw bahala"],
                    ["name"=>"movies","description"=>"usb, cds, or dvds but who still use those?"],
                    ["name"=>"display","description"=>"monitors, projectors and those stuff"],
		);

		// Uncomment the below to run the seeder
		 DB::table('contributions')->insert($contributions);
	}

}
