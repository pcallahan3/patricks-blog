<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
Subjects controller
*/
class Subjects extends CI_Controller {

	function __construct(){

		parent::__construct();

		//Check login
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}

	}

	//Index subjects functionality
	public function index(){
		//Get a list of all subjects with the get_list() in the subject_model
		$data['subjects'] = $this->Subject_model->get_list();
		//Load template and pass subjects data into template
		$this->template->load('admin', 'default', 'subjects/index', $data);
	}

	//Add subjects functionality
	public function add(){
		//Use form_validation to set validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]');

		if($this->form_validation->run() == FALSE){
			//Load template
			$this->template->load('admin', 'default', 'subjects/add');

		}
		else{
			//Create Subject POST array
			$data = array(
					'name' => $this->input->post('name')

				);

			//Insert subject into subjects table
			$this->Subject_model->add($data);

			//Activity array
			$data = array(
					'resource_id' => $this->db->insert_id(),
					'type' => 'subject',
					'action' => 'added', 
					'user_id' => 1,
					'message' => 'A new subject was added ('.$data["name"].')'

			);

			//Insert activity into activity table
			$this->Activity_model->add($data);

			//Set message 
			$this->session->set_flashdata('success', 'Subject has been added');

			//Redirect to admin/subject
			redirect('admin/subjects');

		}

		
	}

	//Edit subjects functionality
	public function edit($id){
		//Use form_validation to set validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]');

		if($this->form_validation->run() == FALSE){
			//Get current subject
			$data['item'] = $this->Subject_model->get($id);

			//Load template
			$this->template->load('admin', 'default', 'subjects/edit', $data);

		}
		else{

			$old_name = $data['item'] = $this->Subject_model->get($id)->name;
			$new_name = $this->input->post('name');

			//Create Subject POST array
			$data = array(
					'name' => $this->input->post('name')

				);

			//Update subject in subjects table
			$this->Subject_model->update($id, $data);

			//Activity array
			$data = array(
					'resource_id' => $this->db->insert_id(),
					'type' => 'subject',
					'action' => 'updated', 
					'user_id' => 1,
					'message' => 'A subject ('.$old_name.') was renamed ('.$new_name.')'

			);

			//Insert activity into activity table
			$this->Activity_model->add($data);

			//Set message 
			$this->session->set_flashdata('success', 'Subject has been updated');

			//Redirect to admin/subject
			redirect('admin/subjects');

		}
	}

	//Delete subjects functionality
	public function delete($id){
		
			$name = $data['item'] = $this->Subject_model->get($id)->name;

			//Delete the subject
			$this->Subject_model->delete($id);

			//Activity array
			$data = array(
					'resource_id' => $this->db->insert_id(),
					'type' => 'subject',
					'action' => 'deleted', 
					'user_id' => 1,
					'message' => 'A subject was deleted'

			);

			//Insert activity into activity table
			$this->Activity_model->add($data);

			//Set message 
			$this->session->set_flashdata('success', 'Subject has been deleted');

			//Redirect to admin/subject
			redirect('admin/subjects');

		}
	
}
