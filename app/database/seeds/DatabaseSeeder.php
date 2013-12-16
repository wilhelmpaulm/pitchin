<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();

//        $this->call('UserTableSeeder');
        $this->call('RemindersTableSeeder');
        $this->call('User_badgesTableSeeder');
        $this->call('BadgesTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('ContributionsTableSeeder');
        $this->call('Party_membersTableSeeder');
        $this->call('Party_contributionsTableSeeder');
        $this->call('Party_chatsTableSeeder');
        $this->call('Party_typesTableSeeder');
        $this->call('PartiesTableSeeder');
    	$this->call('UsersTableSeeder');
		$this->call('GendersTableSeeder');
	}

}
