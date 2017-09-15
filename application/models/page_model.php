<?php

/*
	Pages model
*/

class Page_model extends CI_MODEL{

	function __construct(){

		parent::__construct();

		//Pages table 
		$this->table = 'pages';
	}

	//Get a list of pages from the pages table
	public function get_list(){
		$query = $this->db->get($this->table);
		return $query->result();
	}

	//Get page $id 
	public function get($id){
		$query = $this->db->get($this->table);
		$this->db->where('id', $id);
		return $query->row();
	}

	//Add a page in the pages  table 
	public function add($data){
		$this->db->insert($this->table, $data);

	}

	//Update a page in the pages table 
	public function update($id, $data){
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);

	}

	//Delete a page from pages table
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}


}