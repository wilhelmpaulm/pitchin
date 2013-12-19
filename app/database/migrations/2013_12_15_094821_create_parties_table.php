<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartiesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('parties', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('owner');
            $table->string('name');
            $table->string('picture')->nullable();
            $table->string('address')->nullable();
            $table->string('x')->nullable();
            $table->string('y')->nullable();
            $table->text('description')->nullable();
            $table->string('date_start')->nullable();
            $table->string('date_end')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('parties');
    }

}
