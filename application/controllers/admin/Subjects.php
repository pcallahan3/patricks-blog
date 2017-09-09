<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {

	public function index()
	{
		//Load template
		$this->template->load('admin', 'default', 'subjects/index');
	}

	public function add()
	{
		//Use form_validation to set validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]');

		if($this->form_validation->run() == FALSE){
			//Load template
			$this->template->load('admin', 'default', 'subjects/add');

		}

		
	}

	public function edit()
	{
		//Load template
		$this->template->load('admin', 'default', 'subjects/edit');
	}

	public function delete()
	{
		
	}
}
