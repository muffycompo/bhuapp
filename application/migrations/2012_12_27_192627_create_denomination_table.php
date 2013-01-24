<?php

class Create_Denomination_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('denomination', function($table){
			$table->increments('id');
			$table->string('denomination_name');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('denomination');
	}

}