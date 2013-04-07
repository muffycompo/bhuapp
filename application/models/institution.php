<?php
class Institution extends Basemodel{
	public static $table = 'institutions';
	public static $timestamps = false;

	public function user(){
		return $this->belongs_to('User');
	}

	public static $institution_rules = array(
		'institution' => 'required',
		'from' => 'required|numeric',
		'to' => 'required|numeric',
		'qualification' => 'required'
	);

	public static function institution_validation($input){
		return static::validation($input, static::$institution_rules);
	}

	public static function create_institution($data){
		$user_id = Session::get('user_id');
		$institution_data = array(
			'user_id' => $user_id,
			'institution_name' => $data['institution'],
			'from_year' => $data['from'],
			'to_year' => $data['to'],
			'qualification' => $data['qualification']
		);

        if(self::check_institution_exists($user_id,$data['institution'],$data['from'],$data['to'],$data['qualification']) === false ){
            if(self::check_institution_quota($user_id)){
                static::create($institution_data);
                return true;
            } else {
                return 2;
            }
        } else {
            return 1;
        }

			
	}

	public static function update_institution($data){
		$id = $data['id'];
		$institution_data = array(
			'institution_name' => $data['institution'],
			'from_year' => $data['from'],
			'to_year' => $data['to'],
			'qualification' => $data['qualification']
		);
		$edit_institution = DB::table('institutions')->where('id','=', $id)->update($institution_data);
		if($edit_institution){ return true;} else { return false;}
	}

	public static function institution_list(){
		$user_id = Session::get('user_id');
		$institution_get_data = User::find($user_id)->institution()->order_by('id', 'asc')->get();
		return $institution_get_data;
	}

	public static function delete_institution($id){
		$delete = DB::table('institutions')->where('id','=', $id)->delete();
		if($delete){ return true;} else { return false;}
	}

	public static function edit_institution($id){
		$edit = DB::table('institutions')->where('id','=', $id)->first();
		if($edit){ return $edit;} else { return false;}
	}

	protected static function check_institution_quota($user_id){
		$count = DB::table('institutions')->where('user_id','=',$user_id)->count();
		if($count >= 4){return false;} else { return true;}
	}

    protected static function check_institution_exists($user_id, $institution_name, $from_year, $to_year, $qualification){
        $count = DB::table('institutions')->where('user_id','=',$user_id)
            ->where('institution_name','=',$institution_name)
            ->where('from_year','=',$from_year)
            ->where('to_year','=',$to_year)
            ->where('qualification','=',$qualification)
            ->count();
        if($count > 0){return true;} else { return false;}
    }

}