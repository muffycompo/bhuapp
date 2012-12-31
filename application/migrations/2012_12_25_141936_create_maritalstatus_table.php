<?php

class Create_Maritalstatus_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('marital_status', function($table){
			$table->increments('id');
			$table->string('marital_status_name');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('marital_status');
	}

}