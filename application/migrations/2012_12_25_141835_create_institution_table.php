<?php

class Create_Institution_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('institutions', function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->string('institution_name');
			$table->string('from_year','4');
			$table->string('to_year','4');
			$table->string('qualification');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('institutions');
	}

}