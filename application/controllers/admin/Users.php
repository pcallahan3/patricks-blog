<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index(){
		//Load template
		$this->template->load('admin', 'default', 'users/index');
	}

	public function add(){

		//Field Rules
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[7]|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password2', 'trim|required|min_length[6]|matches[password2]');
		

		if($this->form_validation->run() == False){

			//Load template
			$this->template->load('admin', 'default', 'users/add');
		}
		else{
			
			//User data array
			$data = array(
					'first_name' 	=> $this->input->post('first_name'),
					'last_name'     => $this->input->post('last_name'),
					'username'      => $this->input->post('username'),
					'email'         => $this->input->post('email'),
					'password'      => md5($this->input->post('password'))
			);

			//Insert User
			$this->User_model->add($data);


			//Activity array
			$data = array(
					'resource_id' => $this->db->insert_id(),
					'type' => 'user',
					'action' => 'added', 
					'user_id' => 1,
					'message' => 'A new user was added ('.$data["title"].')'

			);

			//Insert activity into activity table
			$this->Activity_model->add($data);

			//Set message 
			$this->session->set_flashdata('success', 'User has been added');

			//Redirect to admin/subject
			redirect('admin/users');
		}

		
	}

	public function edit(){
		//Load template
		$this->template->load('admin', 'default', 'users/edit');
	}

	public function delete(){
		
	}

	public function login(){
		
	}

	public function logout(){
		
	}
}
