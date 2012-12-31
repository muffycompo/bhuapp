<?php

class Create_Education_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('education', function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('first_choice_id');
			$table->integer('second_choice_id');
			$table->string('jamb_number','20');
			$table->string('jamb_score','3');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('education');
	}

}