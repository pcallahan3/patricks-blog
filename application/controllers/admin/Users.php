<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
	Users controller
*/
class Users extends Admin_Controller {

	function __construct(){

		parent::__construct();


	}

	//Index users functionality
	public function index(){

		//Check login
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}

		$data['users'] = $this->User_model->get_list();
		//Load template
		$this->template->load('admin', 'default', 'users/index', $data);
	}

	//Add users functionality
	public function add(){

		//Check login
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}


		//Field Rules
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[7]|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password2', 'trim|required|min_length[6]|matches[password2]');
		

		if($this->form_validation->run() == FALSE){

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
					'message' => 'A new user was added ('.$data["username"].')'

			);

			//Insert activity into activity table
			$this->Activity_model->add($data);

			//Set message 
			$this->session->set_flashdata('success', 'User has been added');

			//Redirect to admin/users
			redirect('admin/users');
		}

		
	}

	//Edit users functionality
	public function edit($id){

		//Check login
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}

		//Field Rules
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[7]|valid_email');
		
		

		if($this->form_validation->run() == FALSE){
			//Get current user
			$data['item'] = $this->User_model->get($id);
			//Load template
			$this->template->load('admin', 'default', 'users/edit', $data);
		}
		else{
			
			//User data array
			$data = array(
					'first_name' 	=> $this->input->post('first_name'),
					'last_name'     => $this->input->post('last_name'),
					'username'      => $this->input->post('username'),
					'email'         => $this->input->post('email')
			);

			//Update User
			$this->User_model->update($id, $data);


			//Activity array
			$data = array(
					'resource_id' => $this->db->insert_id(),
					'type' => 'user',
					'action' => 'updated', 
					'user_id' =>  $this->session->userdata('user_id'),
					'message' => 'A user was updated ('.$data["username"].')'

			);

			//Insert activity into activity table
			$this->Activity_model->add($data);

			//Set message 
			$this->session->set_flashdata('success', 'User has been updated');

			//Redirect to admin/users
			redirect('admin/users');
		}
	}

	//Delete users functionality
	public function delete($id){

		//Check login
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}

		//Get username
		$username = $this->User_model->get($id)->username;

		//Delete user
		$this->User_model->delete($id);

		//Activity array
			$data = array(
					'resource_id' => $this->db->insert_id(),
					'type' => 'user',
					'action' => 'deleted', 
					'user_id' =>  $this->session->userdata('user_id'),
					'message' => 'A user was deleted ('.$data["username"].')'

			);

			//Insert activity into activity table
			$this->Activity_model->add($data);

			//Set message 
			$this->session->set_flashdata('success', 'User has been updated');

			//Redirect to admin/users
			redirect('admin/users');
		
	}

	//Login users functionality
	public function login(){
		//Field Rules
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
		

		if($this->form_validation->run() == FALSE){
			//Load template
			$this->template->load('admin', 'login', 'users/login');
		}
		else{
			
			//Get POST data
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$enc_password = md5($password);

			$user_id = $this->User_model->login($username, $enc_password);

			if($user_id){
				$user_data = array(
							'user_id' => $user_id,
							'username' => $username,
							'logged_in' => true
					);

					//Set session data
					$this->session->set_userdata($user_data);

					//Set message 
					$this->session->set_flashdata('success', 'You are logged in');

					//Redirect to admin
					redirect('admin/dashboard');
			}
			else{
				//Create error
				$this->session->set_flashdata('error', 'Invalid login');

				//Redirect to admin login
				redirect('admin/users/login');

			}
		}

		
	}

	//Logout users functionality
	public function logout(){
		//Unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();

		//Message
		$this->session->set_flashdata('success', 'You are logged out' );
		redirect('admin/users/login');
	}
}
