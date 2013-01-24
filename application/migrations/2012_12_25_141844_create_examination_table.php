<?php

class Create_Examination_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('examinations', function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('exam_type_id');
			$table->string('exam_date','4');
			$table->string('exam_number','20');
			$table->integer('exam_subject_id');
			$table->integer('exam_grade_id');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('examinations');
	}

}