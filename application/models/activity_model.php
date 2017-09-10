<?php


class Activity_model extends CI_MODEL{

	function __construct(){

		parent::__construct();
		$this->table = 'activities';
	}

	//Get list of subjects from subject table
	public function get_list(){

		$query = $this->db->get($this->table);

		return $query->result();
	}

	//Add activity to activity table 
	public function add($data){
		$this->db->insert($this->table, $data);

	}

}