<?php

class Create_Relationships_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relationships', function($table){
			$table->increments('id');
			$table->string('relationship_name');
			
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('relationships');
	}

}