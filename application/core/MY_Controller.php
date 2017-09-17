<?php



class MY_Controller extends CI_Controller{

	function __construct(){
		parent::__construct();
	}
}

	class Public_Controller extends MY_Controller{

		function __construct(){
			parent::__construct();
			
		}
	}

	class Admin_Controller extends MY_Controller{

		function __construct(){
			parent::__construct();
			
		}
	}

