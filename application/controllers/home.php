<?php

class Home_Controller extends Base_Controller {
	public $restful = true;
	public function get_index()
	{
		if(Auth::check()){
			return Redirect::to_route('dashboard');
		} else {
			return View::make('home.index');
		}
	}

	public function get_documentation()
	{
		return View::make('home.documentation');
	}

	public function get_registration_guide()
	{
		return Response::download(path('public') . DS . '/forms/APPLICANT_CONFIDENTIAL_REPORT.pdf', 'APPLICANT_CONFIDENTIAL_REPORT');
	}

}