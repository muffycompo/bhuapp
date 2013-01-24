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

	public static function message_response($type, $message){
		$response = '<div class="' . strtolower($type) . 'Feedback">
			<p>' . $message . '</p>
		</div>';

		return $response;
	}

}