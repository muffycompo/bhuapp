<?php

class Create_Examgrades_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam_grades', function($table){
			$table->increments('id');
			$table->string('exam_grade_name');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exam_grades');
	}

}