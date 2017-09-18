<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
	Pages controller
*/
class Pages extends Public_Controller {

	public function index(){

		$data['featured_pages'] = $this->Page_model->get_featured();

		//Load template
		$this->template->load('public', 'default', 'pages/index', $data);
	}
}
