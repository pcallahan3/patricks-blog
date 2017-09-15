<?php

/*
	Subject model
*/


class Subject_model extends CI_MODEL{

	function __construct(){

		parent::__construct();

		//Subjects table
		$this->table = 'subjects';
	}

	//Get a list of subjects from subject table
	public function get_list(){
		$query = $this->db->get($this->table);
		return $query->result();
	}

	//Get subject $id 
	public function get($id){
		$query = $this->db->get($this->table);
		$this->db->where('id', $id);
		return $query->row();
	}

	//Add subject to subjects table 
	public function add($data){
		$this->db->insert($this->table, $data);

	}

	//Update subject in the subjects table 
	public function update($id, $data){
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);

	}

	//Delete a subject from the subjects table
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}


}