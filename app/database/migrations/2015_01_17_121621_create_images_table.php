<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('images', function ($table) {
            $table->increments('id');
            $table->string('file_path');
            $table->integer('publication_id')->unsigned();
            $table->foreign('publication_id')->references('id')->on('publications');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('images');
	}

}
