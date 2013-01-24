<?php
class Validator extends Laravel\Validator{
	public static function validate_pin($attribute, $value){
		if(User::check_pin($value)){ return true;} else {return false;}
	}

	public static function validate_arrayfull($attribute, $value, $parameters){
        $is_full = (in_array('', $value)) ? false : true;
        return $is_full;
    }

    public static function validate_current_password($attribute, $value){
        $user_id = Session::get('user_id');
        $current_password = DB::table('users')->where('id', '=', $user_id)->first()->password;
        if(Hash::check($value, $current_password)){ return true; } else { return false;}
    }

    public static function validate_valid_username($attribute, $value){
    	$unique_username = DB::table('users')->where('username', '=', $value)->count();
    	if($unique_username == 1){ return true; } else { return false;}
    }

    public static function validate_exam_number($attribute, $value){
        return Bhu::check_exam_number($value);
    }

    public static function validate_gsm_number($attribute, $value){
        return Bhu::check_gsm_number($value);
    }

}