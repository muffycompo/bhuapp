<?php
class Bhu {
	
    public static function generate_username($firstname, $surname){
		return Str::lower(substr($firstname, 0, 3) . substr($surname, 0, 3) . self::password_gen());
	}

	public static function password_gen($chars_min=6, $chars_max=6, $use_upper_case=false, $include_numbers=false, $include_special_chars=false){
		$length = rand($chars_min, $chars_max);
        //$selection = 'aeuoyibcdfghjklmnpqrstvwxz';
        $selection = '1234567890';
        /*if($include_numbers) {
            $selection .= '1234567890';
        }*/
        if($include_special_chars) {
            $selection .= '!@\"#$%&[]{}?';
        }
                                
        $password = '';
        for($i=0; $i<$length; $i++) {
            $current_letter = $use_upper_case ? (rand(0,1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];            
            $password .=  $current_letter;
        }                
        
        return $password;		
	}

    public static function programme_dropdown($name, $selected = null, $attrib = array()){
        $opts = DB::table('programmes')->get();
        foreach($opts as $opt){
            $options[$opt->id] = $opt->programme_name;
        }
        return Form::select($name, $options, $selected, $attrib);
    }

    public static function religion_dropdown($name, $selected = null, $attrib = array()){
        $opts = DB::table('religion')->get();
        foreach($opts as $opt){
            $options[$opt->id] = $opt->religion_name;
        }
        return Form::select($name, $options, $selected, $attrib);
    }

    public static function gender_dropdown($name, $selected = null, $attrib = array()){
        $opts = DB::table('gender')->get();
        foreach($opts as $opt){
            $options[$opt->id] = $opt->gender_name;
        }
        return Form::select($name, $options, $selected, $attrib);
    }

    public static function title_dropdown($name, $selected = null, $attrib = array()){
        $opts = DB::table('titles')->get();
        foreach($opts as $opt){
            $options[$opt->id] = $opt->title_name;
        }
        return Form::select($name, $options, $selected, $attrib);
    }

    public static function state_dropdown($name, $selected = null, $attrib = array()){
        $opts = DB::table('states')->get();
        foreach($opts as $opt){
            $options[$opt->id] = $opt->state_name;
        }
        return Form::select($name, $options, $selected, $attrib);
    }

    public static function country_dropdown($name, $selected = null, $attrib = array()){
        $opts = DB::table('countries')->get();
        foreach($opts as $opt){
            $options[$opt->id] = $opt->country_name;
        }
        return Form::select($name, $options, $selected, $attrib);
    }

    public static function bank_dropdown($name, $selected = null, $attrib = array()){
        $opts = DB::table('banks')->get();
        foreach($opts as $opt){
            $options[$opt->id] = $opt->bank_name;
        }
        return Form::select($name, $options, $selected, $attrib);
    }

    public static function exam_subject_dropdown($name, $selected = null, $attrib = array()){
        $opts = DB::table('exam_subjects')->get();
        foreach($opts as $opt){
            $options[$opt->id] = $opt->subject_name;
        }
        return Form::select($name, $options, $selected, $attrib);
    }

    public static function exam_grade_dropdown($name, $selected = null, $attrib = array()){
        $opts = DB::table('exam_grades')->get();
        foreach($opts as $opt){
            $options[$opt->id] = $opt->exam_grade_name;
        }
        return Form::select($name, $options, $selected, $attrib);
    }

    public static function exam_type_dropdown($name, $selected = null, $attrib = array()){
        $opts = DB::table('exam_types')->get();
        foreach($opts as $opt){
            $options[$opt->id] = $opt->exam_name;
        }
        return Form::select($name, $options, $selected, $attrib);
    }

    public static function marital_status_dropdown($name, $selected = null, $attrib = array()){
        $opts = DB::table('marital_status')->get();
        foreach($opts as $opt){
            $options[$opt->id] = $opt->marital_status_name;
        }
        return Form::select($name, $options, $selected, $attrib);
    }

    public static function denomination_dropdown($name, $selected = null, $attrib = array()){
        $opts = DB::table('denomination')->get();
        foreach($opts as $opt){
            $options[$opt->id] = $opt->denomination_name;
        }
        return Form::select($name, $options, $selected, $attrib);
    }

    public static function check_institution(){
        $user_id = Session::get('credentials')['user_id'];
        return Institution::check_institution_quota($user_id);
    }

    public static function check_examination(){
        $user_id = Session::get('credentials')['user_id'];
        return Examination::check_examination_quota($user_id);
    }

    public static function passport(){
        $username = Session::get('credentials')['username'];
        $dir = 'public/uploads/' . $username . '/passport/';
        $return_dir = 'uploads/' . $username . '/passport/';
        // $passport_path = 'public/uploads/' . $username . '/passport/';
        // Check if file exist
        if(file_exists($dir)){
            $files = array_diff(scandir($dir), array('.','..'));
            $file = array();
            foreach ($files as $key => $value) {
                $file[] = $value;
            }
            $filepath = $dir . $file[0];
            $return_filepath = $return_dir . $file[0];
            if(file_exists($filepath)){ return $return_filepath;} else { return false;}
        } else {
            return false;
        }
    }

}