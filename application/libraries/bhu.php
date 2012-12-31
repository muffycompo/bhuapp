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
        // Check if file exist
        if(file_exists($dir)){
            // Remove the . and .. introduced by scandir() using array_diff()
            $files = array_diff(scandir($dir), array('.','..'));
            $file = array();
            foreach ($files as $key => $value) {
                $file[] = $value;
            }
            if(!isset($file[0])){ return false;}
            $filepath = $dir . $file[0];
            $return_filepath = $return_dir . $file[0];
            if(file_exists($filepath)){ return $return_filepath;} else { return false;}
        } else {
            return false;
        }
    }

    public static function upload_file($upload_id, $data){
        $username = Session::get('credentials')['username'];
        if($upload_id == 1){
            $user_upload_dir = 'public/uploads/' . $username . '/passport';
            $ext = explode('.', File::extension($data['upload_passport']['name']));
            $filename = $username. '.' .$ext[0];
            // Upload file to folder
            $upload = Input::upload('upload_passport', $user_upload_dir, $filename);
            // Resize Passport to 105px X 115px
            Bundle::start('resizer');
            $resize = Resizer::open($user_upload_dir . '/' . $filename)
                    ->resize(105, 115, 'exact' )
                    ->save($user_upload_dir . '/' . $filename, 90);

        } else {
            $user_upload_dir = 'public/uploads/' . $username . '/documents';
            $filename = strtolower(str_replace(' ', '_', $data['upload_docs']['name']));
            // Upload file to folder
            $upload = Input::upload('upload_docs', $user_upload_dir, $filename);
        }
        // Check if folder for user does not exist and create it
        if(!file_exists($user_upload_dir)){
            mkdir($user_upload_dir,0777,true);
        }
        return $upload;
    }

    public static function document_list($username){
        $dir = 'public/uploads/' . $username . '/documents/';
        // Remove the . and .. generated by scandir() using array_diff()
        $files = array_diff(scandir($dir), array('.','..'));
        return $files;
    }

    public static function docs_path($username){
        return $return_path = 'uploads/' . $username . '/documents/';
    }

    public static function remove_docs($username, $document){
        $dir = 'public/' . static::docs_path($username);
        $status = File::delete($dir . $document);
        if($status === null){ return false;} else { return true;}
    }

    public static function update_form_status($update_number = ''){
        $user_id = Session::get('credentials')['user_id'];
        $form = static::form_completion();
        if($form < $update_number){
            $update = DB::table('statuses')->where('user_id', '=', $user_id)->update(array('form_completion' => $update_number));
            if($update){ return true;} else {return false;}
        } else {
            return false;
        }
    }

    public static function form_completion(){
        $user_id = Session::get('credentials')['user_id'];
        $form = DB::table('statuses')->where('user_id', '=', $user_id)->first()->form_completion;
        return $form;
    }

    public static function check_exam_number($number){
        // Validate JAMB, WAEC, NECO, NABTEB examination numbers
        $pattern = '/^(\d{8}|\d{10})(\w{2})?$/';
        $validate = preg_match($pattern, $number);
        if($validate){ return true;} else { return false;}
    }

    public static function check_gsm_number($number){
        // Validate GSM numbers
        $pattern = '/^0[78][01]\d{8}$/';
        $validate = preg_match($pattern, $number);
        if($validate){ return true;} else { return false;}
    }

}