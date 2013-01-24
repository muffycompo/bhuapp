<?php

class Create_Programme_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('programmes', function($table){
			$table->increments('id');
			$table->string('programme_name');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('programmes');
	}

}