<?php

class Create_Parentguardian_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parent_guardian', function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->string('parent_name','40');
			$table->text('parent_home_address');
			$table->text('parent_office_address');
			$table->integer('relationship');
			$table->string('parent_gsm_no','15');
			$table->string('parent_email_address');
			$table->string('parent_occupation','150');
			$table->string('sponsor_name','40');
			$table->text('sponsor_address');
			$table->string('sponsor_gsm_no','15');
			$table->string('sponsor_occupation','150');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('parent_guardian');
	}

}