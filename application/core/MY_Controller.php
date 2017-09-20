<?php



class MY_Controller extends CI_Controller{

	function __construct(){
		parent::__construct();
	}
}


	class Admin_Controller extends MY_Controller{

		function __construct(){
			parent::__construct();
			
		}
	}


	class Public_Controller extends MY_Controller{

		function __construct(){
			parent::__construct();

			$this->load->library('menu');

			$this->pages = $this->menu->get_pages();

			//Brand logo 
			$this->brand = 'Patricks Software Blog';

			//Banner
			$this->banner_heading = 'Welcome to Patricks Software Blog';
			//$this->banner_text = '';
			$this->banner_link = 'pages/show/our-team';
			
		}
	}


	


