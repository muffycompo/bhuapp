<?php
class Basemodel extends Eloquent{
	
	public static function validation($input_data, $rules){
		$validation = Validator::make($input_data, $rules);
		if($validation->passes()){
			return TRUE;
		} else {
			return $validation;
		}
	}

}