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
		'password' => 'required'
	);

	public static $signup_rules = array(
		'surname' => 'required',
		'first_name' => 'required',
		'email' => 'required|email',
		'phone' => 'required|numeric|gsm_number',
		'pin_number' => 'required|numeric|pin',
		'teller' => 'required'
	);

	public static $upload_rules = array('upload_passport' => 'required|image|mimes:jpg,png,jpeg,gif');

	public static $uploaded_rules = array('upload_docs' => 'required|mimes:jpg,png,jpeg,gif,pdf,doc,docx');

	public static $password_rules = array(
		'current_password' => 'required|current_password',
		'password' => 'required|confirmed',
		'password_confirmation' => 'required'
	);

	public static $password_reset_rules = array('username' => 'required|valid_username');

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

	public static function password_validation($input){
		return static::validation($input, static::$password_rules);
	}

	public static function password_reset_validation($input){
		return static::validation($input, static::$password_reset_rules);
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
				'formno' => $user_biodata->formno
			);
			Session::put('firstname', $user_biodata->firstname);
			Session::put('surname', $user_biodata->surname);
			Session::put('othernames', $user_biodata->othernames);
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
			// Create Forms completion status
			DB::table('statuses')->insert(array('user_id' => $new_user->id));
			$return_credentials = array('username'=>$user['username'],'password'=>$pass,'email'=>$biodata['email_address'],'gsm_no'=>$biodata['gsm_no']);
			return $return_credentials;
		} else {
			return false;
		}
	}

	public static function uploads($upload_id, $data){
		return Bhu::upload_file($upload_id, $data);
	}

	public static function documents(){
		$username = Session::get('credentials')['username'];
		$files = Bhu::document_list($username);
		foreach($files as $k => $v){
            $file[] = $v;
        }
        return $file;
	}

	public static function documents_path(){
		$username = Session::get('credentials')['username'];
		return Bhu::docs_path($username);
	}

	public static function remove_document($document){
		$username = Session::get('credentials')['username'];
		return Bhu::remove_docs($username, $document);
	}

	public static function change_current_password($data){
		$user_id = Session::get('credentials')['user_id'];
		$password = DB::table('users')->where('id', '=', $user_id)->update(array('password' => Hash::make($data['password'])));
		if($password){ return true;} else {return false;}
	}

	public static function reset_password($data){
		$id = DB::table('users')->where('username', '=', $data['username'])->first()->id;
		$user = DB::table('biodata')->where('user_id','=',$id)->first();
		$password = Bhu::password_gen();
		// Send Email and SMS
		$tmp = array(
			'email' => $user->email_address,
			'gsm_no' => $user->gsm_no,
			'password' => $password
		);
		// Update User Password
		$update_user = DB::table('users')->where('id', '=', $id)->update(array('password' => Hash::make($password)));
		if($update_user){ return $tmp;} else { return false;}

	}

}