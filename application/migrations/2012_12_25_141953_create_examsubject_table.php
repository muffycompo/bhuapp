<?php

class Create_Examsubject_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam_subjects', function($table){
			$table->increments('id');
			$table->string('subject_name');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exam_subjects');
	}

}