<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartyContributionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('party_contributions', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('party_id');
			$table->integer('user_id');
			$table->integer('contribution_id');
			$table->integer('quantity');
			$table->string('name');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('party_contributions');
	}

}
