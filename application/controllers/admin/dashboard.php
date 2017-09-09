<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function index()
	{
		//Load template
		$this->template->load('admin', 'default', 'dashboard');
	}
}
