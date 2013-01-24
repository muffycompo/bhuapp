<?php

class Create_Examtype_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam_types', function($table){
			$table->increments('id');
			$table->string('exam_name');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exam_types');
	}

}