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
			$this->brand = 'Patricks Blog';

			//Banner
			$this->banner_heading = 'Welcome to Patricks Blog';
			$this->banner_text = 'Quick example of a banner header';
			$this->banner_link = 'pages/show/our-team';
			
		}
	}


	


