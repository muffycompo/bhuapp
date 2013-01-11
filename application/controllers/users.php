<?php
class Users_Controller extends Base_Controller{
	public $restful = true;

	public function __construct(){
		$this->filter('before', 'csrf')->on('post');
		$this->filter('before', 'mauth')->except(array('password_reset','signup','signup_success','login','email_test'));
	}

	public function post_login(){
		$validate = User::user_validation(Input::all());
		if($validate === true){
			$login = User::login_user(Input::all());
			if($login){
				return Redirect::to_route('dashboard');
			} else {
				return Redirect::to_route('home')->with('message', User::message_response('error', 'The Username/Password combination is invalid!'))->with_input();
			}
		} else {
			return Redirect::to_route('home')->with_errors($validate)->with_input();
		}
	}

	public function post_signup(){
		$validate = User::signup_validation(Input::all());
		if($validate === true){
			$signup = User::new_user(Input::all());
			// $signup = true;
			if($signup !== false){
				// Send Email
				User::signup_welcome_email($signup);
                // Send SMS
                Bhu::signup_sms($signup);
				return Redirect::to_route('signup_success')->with('message', $signup);
			} else {
				return Redirect::to_route('signup')->with('message', User::message_response('error', 'An error has occured, please try again!'))->with_input();
			}
			
		} else {
			return Redirect::to_route('signup')->with_errors($validate)->with_input();
		}
	}

	public function get_signup(){
		return View::make('users.signup');
	}

	public function get_signup_success(){
		$message = Session::get('message');
		return View::make('users.signup_success')->with('user_details', $message);
	}

	public function get_password_reset(){
		return View::make('users.password_reset');
	}

	public function get_dashboard(){
		return View::make('users.dashboard');
	}

	public function get_forms(){
		return View::make('users.forms');
	}

	public function get_biodata(){
		$user_data = Biodata::biodata_list();
		return View::make('users.biodata')->with('biodata',$user_data);
	}

	public function post_biodata(){
		$validate = Biodata::biodata_validation(Input::all());
		if($validate === true){
			if(Biodata::update_biodata(Input::all())){
				return Redirect::to_route('forms')->with('message', User::message_response('success', 'Personal Information has been saved!'));
			} else {
				return Redirect::to_route('forms')->with('message', User::message_response('error', 'An error has occured, please try again!'));
			}
		} else {
			return Redirect::to_route('biodata')->with_errors($validate)->with_input();
		}
	}

	public function get_education(){
		// Ensure the user has filled Personal Information section
		if(Bhu::form_completion() < 1){return Redirect::to_route('forms')
			->with('message', User::message_response('error', 'You have not completed the Personal Information section!'));
		}
		$education = Education::education_list();
		$institution = Institution::institution_list();
		$examination = Examination::examination_list();
		return View::make('users.education')
				->with('institution_data', $institution)
				->with('education_data', $education)
				->with('examination_data', $examination);
	}

	public function post_education(){
		$validate = Education::education_validation(Input::all());
		if($validate === true){
			$education = Education::create_education(Input::all());
			if($education){
				return Redirect::to_route('forms')
					->with('message', User::message_response('success', 'Educational Information has been saved!'));
			} elseif($education == 1) {
				return Redirect::to_route('education')
					->with('message', User::message_response('error', 'No Result has been added yet!'))->with_input();
			} elseif($education == 2) {
				return Redirect::to_route('education')
					->with('message', User::message_response('error', 'No Institution has been added yet!'))->with_input();
			} elseif($education == 3) {
				return Redirect::to_route('forms')
					->with('message', User::message_response('error', 'No changes saved even though Institution/Result may have been updated!'))->with_input();
			} else {
				return Redirect::to_route('education')
					->with('message', User::message_response('error', 'An error has occured, please try again!'))->with_input();
			}
		} else {
			return Redirect::to_route('education')->with_errors($validate)->with_input();
		}
	}

	public function get_parents(){
		// Ensure the user has filled Educational Information
		if(Bhu::form_completion() < 2){return Redirect::to_route('forms')
			->with('message', User::message_response('error', 'You have not completed the Educational Information section!'));
		}
		$user_data = Parents::parent_list();
		return View::make('users.parents')->with('parent',$user_data);
	}

	public function post_parents(){
		$validate = Parents::parent_validation(Input::all());
		if($validate === true){
			if(Parents::create_parent(Input::all())){
				return Redirect::to_route('forms')
					->with('message', User::message_response('success', 'Parent/Guardian Information has been saved!'));
			} else {
				return Redirect::to_route('parents')
					->with('message', User::message_response('error', 'An error has occured, please try again!'))->with_input();
			}
		} else {
			return Redirect::to_route('parents')->with_errors($validate)->with_input();
		}
	}

	public function get_upload(){
		// Ensure the user has filled Parents / Guardian Information section
		if(Bhu::form_completion() < 3){return Redirect::to_route('forms')
			->with('message', User::message_response('error', 'You have not completed the Parent/Guardian Information section!'));
		}
		return View::make('users.upload');
	}

	public function post_upload(){
		$upload_id = Input::get('upload_id');
		switch ($upload_id) {
			case '1':
				$validate = User::upload_validation(Input::all());
				break;
			default:
				$validate = User::uploaded_validation(Input::all());
				break;
		}
		if($validate === true){
			$upload = User::uploads($upload_id, Input::all());
			if($upload !== false){
				if($upload_id == 1) { Bhu::update_form_status(4); }
				return Redirect::to_route('upload')->with('message', User::message_response('success', 'The file has been uploaded!'));
			} else {
				return Redirect::to_route('upload')->with('message', User::message_response('error', 'An error has occured, please try again!'));
			}
		} else {
			return Redirect::to_route('upload')->with_errors($validate)->with_input();
		}
	}

	public function get_uploaded(){
		$uploaded_docs = User::documents();
		return View::make('users.uploaded')->with('documents', $uploaded_docs)
			->with('documents_path', User::documents_path());
	}

	public function get_delete_doc($document){
		$document = str_replace('-','.',$document);
		if(User::remove_document($document)){
			return Redirect::to_route('uploaded')->with('message', User::message_response('success', $document . ' has been deleted'));
		} else {
			return Redirect::to_route('uploaded')->with('message', User::message_response('error', 'An error occured while deleting ' . $document));
		}
	}

	public function get_add_institution(){
		$institution = Institution::institution_list();
		return View::make('users.education_institution')->with('institution_data', $institution);
	}

	public function post_add_institution(){
		$validate = Institution::institution_validation(Input::all());
		if($validate === true){
			if(Institution::create_institution(Input::all())){
				return Redirect::to_route('add_institution')
					->with('message', User::message_response('success', 'Institution has been added!'))->with_input();
			} else {
				return Redirect::to_route('add_institution')
					->with('message', User::message_response('error', 'You already have four(4) Institutions added!'))->with_input();
			}
		} else {
			return Redirect::to_route('add_institution')->with_errors($validate)->with_input(); 
		}
	}

	public function get_add_result(){
		$examination = Examination::examination_list();
		return View::make('users.education_result')->with('examination_data', $examination);
	}

	public function post_add_result(){
		$validate = Examination::examination_validation(Input::all());
		if($validate === true){
			if(Examination::create_examination(Input::all())){
				return Redirect::to_route('add_result')
					->with('message', User::message_response('success', 'Result has been added!'))->with_input();
			} else {
				return Redirect::to_route('add_result')
					->with('message', User::message_response('error', 'You already have eighteen(18) results added!'))->with_input();
			}
		} else {
			return Redirect::to_route('add_result')->with_errors($validate)->with_input();
		}
	}

	public function get_edit_institution($id,$redirect_id){
		$edit_institution = Institution::edit_institution($id);
		switch ($redirect_id) {
			case '1':
				return View::make('users.education_edit_institution')
				->with('redirect_id', $redirect_id)
				->with('edit_data', $edit_institution);
				break;
			default:
				return View::make('users.education_edit_institution_add')
				->with('redirect_id', $redirect_id)
				->with('edit_data', $edit_institution);
				break;
		}
	}

	public function post_edit_institution(){
		$validate = Institution::institution_validation(Input::all());
		$id = Input::get('id');
		$redirect_id = Input::get('redirect_id');
		if($validate === true){
			if(Institution::update_institution(Input::all())){
				switch ($redirect_id) {
					case '1':
						return Redirect::to_route('education')
							->with('message', User::message_response('success', 'Institution has been updated!'));
						break;
					default:
						return Redirect::to_route('add_institution')
							->with('message', User::message_response('success', 'Institution has been updated!'));
						break;
				}
			} else {
				return Redirect::to_route('edit_institution',array($id,$redirect_id))
					->with('message', User::message_response('error', 'An error has occured, please try again!'))->with_input();
			}
		} else {
			return Redirect::to_route('edit_institution',array($id,$redirect_id))->with_errors($validate)->with_input();
		}
	}

	public function get_edit_result($id,$redirect_id){
		$edit_result = Examination::edit_examination($id);
		switch ($redirect_id) {
			case '1':
				return View::make('users.education_edit_result')
				->with('redirect_id', $redirect_id)
				->with('edit_data', $edit_result);
				break;
			default:
				return View::make('users.education_edit_result_add')
				->with('redirect_id', $redirect_id)
				->with('edit_data', $edit_result);
				break;
		}
	}

	public function post_edit_result(){
		$validate = Examination::examination_validation(Input::all());
		$id = Input::get('id');
		$redirect_id = Input::get('redirect_id');
		if($validate === true){
			if(Examination::update_examination(Input::all())){
				switch ($redirect_id) {
					case '1':
						return Redirect::to_route('education')
							->with('message', User::message_response('success', 'Result has been updated!'));
						break;
					default:
						return Redirect::to_route('add_result')
							->with('message', User::message_response('error', 'Result has been updated!'));
						break;
				}
			} else {
				return Redirect::to_route('edit_result',array($id,$redirect_id))
					->with('message', User::message_response('error', 'An error has occured, please try again!'))->with_input();
			}
		} else {
			return Redirect::to_route('edit_result',array($id,$redirect_id))->with_errors($validate)->with_input();
		}
	}

	public function get_delete_institution($id,$redirect_id){
			if(Institution::delete_institution($id)){
				switch ($redirect_id) {
				case '1':
					return Redirect::to_route('education')
					->with('message', User::message_response('success', 'Institution deleted successfully!'));
					break;
				default:
					return Redirect::to_route('add_institution')
					->with('message', User::message_response('success', 'Institution deleted successfully!'));
					break;
			}
		} else {
			switch ($redirect_id) {
				case '1':
					return Redirect::to_route('education')
					->with('message', User::message_response('error', 'An error has occured, please try again!'));
					break;
				default:
					return Redirect::to_route('add_institution')
					->with('message', User::message_response('error', 'An error has occured, please try again!'));
					break;
			}
		}
	}

	public function get_delete_result($id,$redirect_id){
		if(Examination::delete_examination($id)){
			switch ($redirect_id) {
				case '1':
					return Redirect::to_route('education')
					->with('message', User::message_response('success', 'Result deleted successfully!'));
					break;
				default:
					return Redirect::to_route('add_result')
					->with('message', User::message_response('success', 'Result deleted successfully!'));
					break;
			}
		} else {
			switch ($redirect_id) {
				case '1':
					return Redirect::to_route('education')
					->with('message', User::message_response('error', 'An error has occured, please try again!'));
					break;
				default:
					return Redirect::to_route('add_result')
					->with('message', User::message_response('error', 'An error has occured, please try again!'));
					break;
			}
		}
	}

	public function get_password_change(){
		return View::make('users.password_change');
	}

	public function post_password_change(){
		$validate = User::password_validation(Input::all());
		if($validate === true){
			if(User::change_current_password(Input::all())){
				return Redirect::to_route('dashboard')
				->with('message', User::message_response('success', 'Password has been changed and will be active in the next login!'));
			} else {
				return Redirect::to_route('dashboard')
				->with('message', User::message_response('error', 'An error has occured, please try again!'));
			}
		} else {
			return Redirect::to_route('password_change')->with_errors($validate)->with_input();
		}
	}

	public function post_password_reset(){
		$validate = User::password_reset_validation(Input::all());
		if($validate === true){
			$user = User::reset_password(Input::all());
			if($user !== false){
				// Send Reset Email
				User::password_reset_email($user);
                // Send SMS
                Bhu::reset_password_sms($user);
				return View::make('users.password_reset_success')->with('reset_data', $user);
			} else {
				return Redirect::to_route('recovery')->with('message', User::message_response('error', 'An error has occured, please try again!'))->with_input();
			}
		} else {
			return Redirect::to_route('recovery')->with_errors($validate)->with_input();
		}
	}

	public function get_print_form(){
		if(Bhu::form_completion() < 4){return Redirect::to_route('dashboard')
			->with('message', User::message_response('error', 'Your Registration Status is still Incomplete!'));
		}
		// Gather Necessary print data
		$biodata = Biodata::biodata_list();
		$education = Education::education_list();
		$parent = Parents::parent_list();
		$teller = User::teller();
		$institution = Institution::institution_list();
		$examination = Examination::examination_list();
		return View::make('users.print_preview')
				->with('biodata', $biodata)
				->with('education', $education)
				->with('parent', $parent)
				->with('teller', $teller)
				->with('institutions', $institution)
				->with('examinations', $examination);
	}

	public function get_logout(){
		Auth::logout();
		Session::flush();
		return Redirect::to_route('home');
	}
}
