<?php

/*
	User model
*/

class User_model extends CI_MODEL{

	function __construct(){

		parent::__construct();
		$this->table = 'users';
	}

	//Get a list of users from the user table
	public function get_list(){
		$query = $this->db->get($this->table);
		return $query->result();
	}

	//Get user $id 
	public function get($id){
		$this->db->where('id', $id);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	//Add user to users table 
	public function add($data){
		$this->db->insert($this->table, $data);

	}

	//Update user in the users table 
	public function update($id, $data){
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);

	}

	//Delete user from th users table
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

	//Login in usern and check password
	public function login($username, $password){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1){

			return $query->row()->id;
		}
		else{
			return false;
		}
	}

}


