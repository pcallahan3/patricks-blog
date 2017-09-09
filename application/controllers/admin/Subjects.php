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
		//Load template
		$this->template->load('admin', 'default', 'subjects/add');
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
