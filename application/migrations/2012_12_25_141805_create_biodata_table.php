<?php

class Create_Biodata_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('biodata', function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('title_id');
			$table->integer('sex_id');
			$table->integer('state_of_origin_id');
			$table->integer('country_id');
			$table->integer('religion_id');
			$table->integer('marital_status_id');
			$table->string('formno','10');
			$table->string('surname','30');
			$table->string('firstname','30');
			$table->string('othernames','30');
			$table->text('home_address');
			$table->string('gsm_no','15');
			$table->string('email_address');
			$table->string('date_of_birth','20');
			$table->string('pastor_name','40');
			$table->text('pastor_address');
			$table->string('pastor_gsm_no','15');
			$table->integer('denomination_id');
			$table->string('maiden_name','30');
			$table->string('former_name','30');
			$table->boolean('is_suspended');
			$table->boolean('is_expelled');
			$table->boolean('is_denied_admission');
			$table->text('reason');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('biodata');
	}

}