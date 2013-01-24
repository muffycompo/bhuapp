<?php
class Pin extends Basemodel{
	public static $timestamps = false;

	public static function update_pin($pin, $update_data){
		static::where('pin_no','=',$pin)->update(array(
			'user_id' => $update_data['user_id'],
			'bank_id' => $update_data['bank_id'],
			'teller' => $update_data['teller'],
			'pin_status' => 1
		));
	}
}