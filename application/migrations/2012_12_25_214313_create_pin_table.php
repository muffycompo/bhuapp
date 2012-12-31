<?php

class Create_Pin_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pins', function($table){
			$table->increments('id');
			$table->integer('bank_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->string('teller');
			$table->string('pin_no');
			$table->boolean('pin_status')->default(0);
			
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pins');
	}

}