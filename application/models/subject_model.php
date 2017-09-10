<?php


class Subject_model extends CI_MODEL{

	function __construct(){

		parent::__construct();
		$this->table = 'subjects';
	}

	//Get list of subjects from subject table
	public function get_list(){

		$query = $this->db->get($this->table);

		return $query->result();
	}

	//Add subject to subjects table 
	public function add($data){
		$this->db->insert($this->table, $data);

	}

}