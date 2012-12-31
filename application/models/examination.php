<?php
class Examination extends Basemodel{
	public static $table = 'examinations';
	public static $timestamps = false;

	public function user(){
		return $this->belongs_to('User');
	}

	public static $examination_rules = array(
		'exam_date' => 'required',
		'exam_number' => 'required'
	);

	public static function examination_validation($input){
		return static::validation($input, static::$examination_rules);
	}

	public static function create_examination($data){
		$user_id = Session::get('credentials')['user_id'];
		$examination_data = array(
			'user_id' => $user_id,
			'exam_type_id' => $data['exam_type'],
			'exam_date' => $data['exam_date'],
			'exam_number' => $data['exam_number'],
			'exam_subject_id' => $data['exam_subject'],
			'exam_grade_id' => $data['exam_grade']
		);
		if(self::check_examination_quota($user_id)){
			static::create($examination_data);
			return true;
		} else {
			return false;
		}
			
	}


	public static function update_examination($data){
		$id = $data['id'];
		$institution_data = array(
			'exam_type_id' => $data['exam_type'],
			'exam_number' => $data['exam_number'],
			'exam_date' => $data['exam_date'],
			'exam_subject_id' => $data['exam_subject'],
			'exam_grade_id' => $data['exam_grade']
		);
		$edit_institution = DB::table('examinations')->where('id','=', $id)->update($institution_data);
		if($edit_institution){ return true;} else { return false;}
	}

	public static function examination_list(){
		$user_id = Session::get('credentials')['user_id'];
		$examination_get_data = User::find($user_id)->examination()->order_by('id', 'asc')->get();
		return $examination_get_data;
	}

	public static function delete_examination($id){
		$delete = DB::table('examinations')->where('id','=', $id)->delete();
		if($delete){ return true;} else { return false;}
	}

	public static function edit_examination($id){
		$edit = DB::table('examinations')->where('id','=', $id)->first();
		if($edit){ return $edit;} else { return false;}
	}

	protected static function check_examination_quota($user_id){
		$count = DB::table('examinations')->where('user_id','=',$user_id)->count();
		if($count >= 18){return false;} else { return true;}
	}
	


}