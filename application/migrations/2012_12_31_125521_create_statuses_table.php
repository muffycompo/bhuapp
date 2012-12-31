<?php

class Create_Statuses_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('statuses', function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('form_completion')->default(0);
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('statuses');
	}

}