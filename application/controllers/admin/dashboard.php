<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
	Dshboard controller
*/
class Dashboard extends Admin_Controller {

	function __construct(){

		parent::__construct();

		//Check login
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}

	}
	
	public function index(){

		//Get activities
		$data['activities'] = $this->Activity_model->get_list();
		

		//Load template
		$this->template->load('admin', 'default', 'dashboard', $data);
	}
}
