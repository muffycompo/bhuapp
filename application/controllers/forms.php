<?php

class Forms_Controller extends Base_Controller {
	public $restful = true;

	public function __construct(){
		$this->filter('before','mauth');
	}

	public function get_confidential_report(){
		return Response::download(path('public') . DS . '/forms/APPLICANT_CONFIDENTIAL_REPORT.pdf', 'APPLICANT_CONFIDENTIAL_REPORT');
	}

	public function get_character_assessment_form(){
		return Response::download(path('public') . DS . '/forms/CHARACTER_ASSESSMENT_FORM.pdf', 'CHARACTER_ASSESSMENT_FORM');
	}

	public function get_utme_de_assessment_form(){
		return Response::download(path('public') . DS . '/forms/UTME_DE_ASSESSMENT_FORM.pdf', 'UTME_DE_ASSESSMENT_FORM');
	}

	public function get_guidance_counselling_report(){
		return Response::download(path('public') . DS . '/forms/GUIDANCE_COUNSELLING_FORM.pdf', 'GUIDANCE_COUNCELLING_FORM');
	}

}