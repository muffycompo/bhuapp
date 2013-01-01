<?php

class Home_Controller extends Base_Controller {
	public $restful = true;
	public function get_index(){
		if(Auth::check()){
			return Redirect::to_route('dashboard');
		} else {
			return View::make('home.index');
		}
		
	}

}