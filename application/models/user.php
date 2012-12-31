<?php
class User extends Basemodel{
	
	public function biodata(){
		return $this->has_one('Biodata');
	}

	public function education(){
		return $this->has_one('Education');
	}

	public function institution(){
		return $this->has_many('Institution');
	}

	public function examination(){
		return $this->has_many('Examination');
	}
	
	public function parents(){
			return $this->has_one('Parents');
		}

	public static $login_rules = array(
		'username' => 'required|min:3|max:20',
		'password' => 'required|between:6,10'
	);

	public static $signup_rules = array(
		'surname' => 'required',
		'first_name' => 'required',
		'email' => 'required|email',
		'phone' => 'required|numeric',
		'pin_number' => 'required|numeric|pin',
		'teller' => 'required'
	);

	public static $upload_rules = array(
		'upload_passport' => 'required|image|mimes:jpg,png,jpeg,gif'
	);

	public static $uploaded_rules = array(
		'upload_docs' => 'required|mimes:jpg,png,jpeg,gif,pdf,doc,docx'
	);

	public static function user_validation($input){
		return static::validation($input, static::$login_rules);
	}

	public static function signup_validation($input){
		return static::validation($input, static::$signup_rules);
	}

	public static function upload_validation($input){
		return static::validation($input, static::$upload_rules);
	}

	public static function uploaded_validation($input){
		return static::validation($input, static::$uploaded_rules);
	}

	public static function signup_user($data){
		return self::create($data);
	} 

	public static function check_pin($pin){
		$pin_count = DB::table('pins')->where('pin_no','=',$pin)->where('pin_status','=',0)->count();
		if($pin_count == 1){return TRUE;} else { return FALSE;}
	}

	public static function login_user($data){
		$user = array(
			'username' => $data['username'],
			'password' => $data['password']
		);
		if(Auth::attempt($user)){
			// Get User details and store in SESSION
			$user_auth = Auth::user();
			$user_biodata = self::find($user_auth->id)->biodata()->first();
			$session_array = array(
				'user_id' => $user_auth->id,
				'username' => $user_auth->username,
				'firstname' => $user_biodata->firstname,
				'surname' => $user_biodata->surname,
				'othernames' => $user_biodata->othernames,
				'formno' => $user_biodata->formno
			);
			return $session_array;
		} else {
			return false;
		}
	}

	public static function new_user($data){
		$pass = Bhu::password_gen();
		$user = array(
			'username' => Bhu::generate_username($data['first_name'], $data['surname']),
			'password' => Hash::make($pass)
		);
		$biodata = array(
			'surname' => $data['surname'],
			'firstname' => $data['first_name'],
			'email_address' => $data['email'],
			'gsm_no' => $data['phone'],
			'formno' => substr($user['username'],6,6)
		);
		//New User
		$new_user = static::signup_user($user);
		if($new_user){
			$biodata['user_id'] = $new_user->id;
			//New Biodata
			Biodata::create($biodata);
			$pin_data = array(
				'user_id' => $new_user->id,
				'bank_id' => $data['bank'],
				'teller' => $data['teller']
			);
			//Update PIN Information
			Pin::update_pin($data['pin_number'], $pin_data);

			$ret = array('username'=>$user['username'],'password'=>$pass,'email'=>$biodata['email_address'],'gsm_no'=>$biodata['gsm_no']);
			return $ret;
		} else {
			return false;
		}
	}

	public static function uploads($upload_id, $data){
		$username = Session::get('credentials')['username'];
		if($upload_id == 1){
			$user_upload_dir = 'public/uploads/' . $username . '/passport';
			$ext = explode('.', File::extension($data['upload_passport']['name']));
			$upl = 'upload_passport';
			$filename = $username. '.' .$ext[0];
		} else {
			$user_upload_dir = 'public/uploads/' . $username . '/documents';
			$upl = 'upload_docs';
			$filename = strtolower(str_replace(' ', '_', $data['upload_docs']['name']));
		}
		// Check if folder for user exist
		if(!file_exists($user_upload_dir)){
			mkdir($user_upload_dir,0777,true);
		}
		// upload file to folder
		$upload = Input::upload($upl, $user_upload_dir, $filename);
		return $upload;
	}

}