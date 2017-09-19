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
		$this->db->where('id', $id);
		$query = $this->db->get($this->table);
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


	public function get_featured(){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('is_featured', 1);
		$this->db->where('is_published', 1);
		
		$query = $this->db->get();

		if($query->num_rows() >= 1){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_menu_pages(){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('in_menu', 1);
		$this->db->where('is_published', 1);
		$this->db->order_by('order', 'asc');
		
		$query = $this->db->get();

		if($query->num_rows() >= 1){
			return $query->result();
		}
		else{
			return false;
		}
	}


	public function get_by_slug($slug){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('slug', $slug);
		$this->db->where('is_published', 1);
		$this->db->limit(1);
		
		$query = $this->db->get();

		if($query->num_rows() == 1){
			return $query->row();
		}
		else{
			return false;
		}
	}


}