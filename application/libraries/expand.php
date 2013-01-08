<?php 
class Expand {
	
	public static function programme($id){
		$expand = DB::table('programmes')->where('id','=',$id)->first()->programme_name;
		if(!empty($expand)) {return $expand;} else { return null;}
	}
	
	public static function title($id){
		$expand = DB::table('titles')->where('id','=',$id)->first()->title_name;
		if(!empty($expand)) {return $expand;} else { return null;}
	}
	
	public static function state($id){
		$expand = DB::table('states')->where('id','=',$id)->first()->state_name;
		if(!empty($expand)) {return $expand;} else { return null;}
	}
	
	public static function country($id){
		$expand = DB::table('countries')->where('id','=',$id)->first()->country_name;
		if(!empty($expand)) {return $expand;} else { return null;}
	}
	
	public static function religion($id){
		$expand = DB::table('religion')->where('id','=',$id)->first()->religion_name;
		if(!empty($expand)) {return $expand;} else { return null;}
	}
	
	public static function marital_status($id){
		$expand = DB::table('marital_status')->where('id','=',$id)->first()->marital_status_name;
		if(!empty($expand)) {return $expand;} else { return null;}
	}
	
	public static function gender($id){
		$expand = DB::table('gender')->where('id','=',$id)->first()->gender_name;
		if(!empty($expand)) {return $expand;} else { return null;}
	}
	
	public static function exam_type($id){
		$expand = DB::table('exam_types')->where('id','=',$id)->first()->exam_name;
		if(!empty($expand)) {return $expand;} else { return null;}
	}
	
	public static function exam_subject($id){
		$expand = DB::table('exam_subjects')->where('id','=',$id)->first()->subject_name;
		if(!empty($expand)) {return $expand;} else { return null;}
	}
	
	public static function exam_grade($id){
		$expand = DB::table('exam_grades')->where('id','=',$id)->first()->exam_grade_name;
		if(!empty($expand)) {return $expand;} else { return null;}
	}
	
	public static function denomination($id){
		$expand = DB::table('denomination')->where('id','=',$id)->first()->denomination_name;
		if(!empty($expand)) {return $expand;} else { return null;}
	}
	
	public static function bank($id){
		$expand = DB::table('banks')->where('id','=',$id)->first()->bank_name;
		if(!empty($expand)) {return $expand;} else { return null;}
	}

	public static function uc($string = ''){
		return ucwords(strtolower($string));
	}

	public static function ucf($string = ''){
		return ucfirst(strtolower($string));
	}

	public static function upp($string = ''){
		return strtoupper($string);
	}

	public static function has_reason($has_reason){
		$reason = ($has_reason === 0)? 'No' : 'Yes';
		return $reason;
	}

}