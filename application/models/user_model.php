<?php


class User_model extends CI_MODEL{

	function __construct(){

		parent::__construct();
		$this->table = 'users';
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

	//Update subject int subjects table 
	public function update($id, $data){
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);

	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}


}