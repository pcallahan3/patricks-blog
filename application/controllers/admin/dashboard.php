<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function index(){

		//Get activities
		$data['activities'] = $this->Activity_model->get_list();
		

		//Load template
		$this->template->load('admin', 'default', 'dashboard', $data);
	}
}
