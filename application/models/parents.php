<?php
class Parents extends Basemodel{
	public static $table = 'parent_guardian';
	public static $timestamps = false;

	public function user(){
		return $this->belongs_to('User');
	}

	public static $parent_rules = array(
		'parent_name' => 'required',
		'home_address' => 'required',
		'relationship' => 'required',
		'gsm_no' => 'required|numeric|gsm_number',
		'parent_occupation' => 'required'
	);

	public static function parent_validation($input){
		return static::validation($input, static::$parent_rules);
	}

	public static function create_parent($data){
		$user_id = Session::get('credentials')['user_id'];
		if(self::check_parent_exists($user_id)){
			// Update Education Record
			$update_data = array(
				'parent_name' => $data['parent_name'],
				'parent_home_address' => $data['home_address'],
				'parent_office_address' => $data['office_address'],
				'relationship' => $data['relationship'],
				'parent_gsm_no' => $data['gsm_no'],
				'parent_email_address' => $data['email'],
				'parent_occupation' => $data['parent_occupation'],
				'sponsor_name' => $data['sponsor_name'],
				'sponsor_address' => $data['sponsor_address'],
				'sponsor_gsm_no' => $data['sponsor_gsm_no'],
				'sponsor_occupation' => $data['sponsor_occupation']
			);
			$parent_guardian = DB::table('parent_guardian')->where('user_id','=',$user_id)->update($update_data);
			if($parent_guardian){
				Bhu::update_form_status(3);
				return true;
			} else { 
				return false;
			}
		} else {
			// Insert Parent Record
			$insert_data = array(
				'user_id' => $user_id,
				'parent_name' => $data['parent_name'],
				'parent_home_address' => $data['home_address'],
				'parent_office_address' => $data['office_address'],
				'relationship' => $data['relationship'],
				'parent_gsm_no' => $data['gsm_no'],
				'parent_email_address' => $data['email'],
				'parent_occupation' => $data['parent_occupation'],
				'sponsor_name' => $data['sponsor_name'],
				'sponsor_address' => $data['sponsor_address'],
				'sponsor_gsm_no' => $data['sponsor_gsm_no'],
				'sponsor_occupation' => $data['sponsor_occupation']
			);
			$parent_create = self::create($insert_data);
			if($parent_create){
				Bhu::update_form_status(3);
				return true;
			} else {
				return false;
			}
		}
	}

	public static function parent_list(){
		$user_id = Session::get('credentials')['user_id'];
		return User::find($user_id)->parents()->first();
	}

	protected static function check_parent_exists($user_id){
		$count = DB::table('parent_guardian')->where('user_id','=',$user_id)->count();
		if($count == 1){return true;} else { return false;}
	}
}