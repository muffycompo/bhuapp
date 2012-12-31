<?php
class Biodata extends Basemodel{
	public static $table = 'biodata';
	public static $timestamps = false;

	public function user(){
		return $this->belongs_to('User');
	}

	public static $biodata_rules = array(
		'surname' => 'required',
		'first_name' => 'required',
		'email' => 'required|email',
		'gsm_no' => 'required|numeric',
		'home_address' => 'required',
		'day' => 'required|numeric',
		'month' => 'required|numeric',
		'year' => 'required|numeric'
	);

	public static function biodata_validation($input){
		return static::validation($input, static::$biodata_rules);
	}

	public static function biodata_list(){
		$user_id = Session::get('credentials')['user_id'];
		return User::find($user_id)->biodata()->first();
	}

	public static function update_biodata($data){
		return static::where('user_id','=',$data['user_id'])->update(array(
			'title_id' => $data['title'],
			'sex_id' => $data['sex'],
			'state_of_origin_id' => $data['state'],
			'country_id' => $data['country'],
			'religion_id' => $data['religion'],
			'marital_status_id' => $data['marital_status'],
			'surname' => $data['surname'],
			'firstname' => $data['first_name'],
			'othernames' => $data['other_name'],
			'home_address' => $data['home_address'],
			'gsm_no' => $data['gsm_no'],
			'email_address' => $data['email'],
			'date_of_birth' => $data['year'] . '-' .$data['month'] . '-' . $data['day'],
			'pastor_name' => $data['pastor_name'],
			'pastor_address' => $data['pastor_address'],
			'pastor_gsm_no' => $data['pastor_gsm'],
			'denomination_id' => $data['denomination'],
			'maiden_name' => $data['maiden_name'],
			'former_name' => $data['former_names'],
			'is_suspended' => (isset($data['if_suspended'])) ? $data['if_suspended'] : 0,
			'is_expelled' => (isset($data['if_expelled'])) ? $data['if_expelled'] : 0,
			'is_denied_admission' => (isset($data['if_denied_admission'])) ? $data['if_denied_admission'] : 0,
			'reason' => $data['reason']
		));
	}
}