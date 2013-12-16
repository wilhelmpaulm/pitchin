<?php

class UsersTableSeeder extends Seeder {

    public function run() {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->truncate();

        $users = array(
            ["picture" => "picture_1.jpg","last_name" => "Martinez", "first_name" => "Wilhelm", "address" => "1671 Pedro Gil St. Paco Manila", "gender" => "male", "birthdate" => "1993-02-26", "password" => Hash::make("pawie2062"), "email" => "wilhelmpaulm@gmail.com", "mobile" => "09279655572", "x" => "14.578129", "y" => "120.993112"]
        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }

}
