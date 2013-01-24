<?php
class Education extends Basemodel{
	public static $table = 'education';
	public static $timestamps = false;

	public function user(){
		return $this->belongs_to('User');
	}

	public static $education_rules = array(
		'jamb_number' => 'required|exam_number',
		'jamb_score' => 'required|numeric'
	);

	public static $education_rules_ar = array(
		'jamb_number' => 'required|exam_number'
	);

	public static function education_validation($input){
		$awaiting_result = (isset($input['awaiting_result']))? $input['awaiting_result'] : 0;
		if($awaiting_result == 1){
			return static::validation($input, static::$education_rules_ar);
		} else {
			return static::validation($input, static::$education_rules);
		}
	}
	
	public static function create_education($data){
		$user_id = Session::get('user_id');
		if(self::check_education_exists($user_id) && self::check_institutions_exists($user_id) && self::check_exams_exists($user_id)){
			// Update Education Record
			$update_data = array(
				'first_choice_id' => $data['first_choice'],
				'second_choice_id' => $data['second_choice'],
				'jamb_number' => $data['jamb_number'],
				'jamb_score' => $data['jamb_score']
			);
			if(! self::check_institutions_exists($user_id)){ return 2; }
			else if(! self::check_exams_exists($user_id)){ return 1; }
			else{
				$education = DB::table('education')->where('user_id','=',$user_id)->update($update_data);
				if($education){
				Bhu::update_form_status(2);
				return true;
				} else { 
				return 3;
				}
			}		
		} else {
			if(self::check_institutions_exists($user_id)){
				if(self::check_exams_exists($user_id)){
					// Insert Education Record
					$insert_data = array(
						'user_id' => $user_id,
						'first_choice_id' => $data['first_choice'],
						'second_choice_id' => $data['second_choice'],
						'jamb_number' => $data['jamb_number'],
						'jamb_score' => $data['jamb_score']
					);
					$education_create = self::create($insert_data);
					if($education_create){
						Bhu::update_form_status(2);
						return true;
					} else {
						return false;
					}
				} else {
					return 1;
				}
			} else {
				return 2;
			}
		}
	}

	public static function education_list(){
		$user_id = Session::get('user_id');
		return User::find($user_id)->education()->first();
	}

	protected static function check_education_exists($user_id){
		$count = DB::table('education')->where('user_id','=',$user_id)->count();
		if($count == 1){return true;} else { return false;}
	}

	protected static function check_exams_exists($user_id){
		$count = DB::table('examinations')->where('user_id','=',$user_id)->count();
		if($count > 0){return true;} else { return false;}
	}

	protected static function check_institutions_exists($user_id){
		$count = DB::table('institutions')->where('user_id','=',$user_id)->count();
		if($count > 0){return true;} else { return false;}
	}

}