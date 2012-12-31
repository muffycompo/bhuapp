<?php
class Validator extends Laravel\Validator{
	public static function validate_pin($attribute, $value){
		if(User::check_pin($value)){ 
			return TRUE;
		} else { 
			return FALSE;
		}
	}

	public static function validate_arrayfull($attribute, $value, $parameters){
        $is_full = (in_array('', $value)) ? false : true;
        return $is_full;
    }
}