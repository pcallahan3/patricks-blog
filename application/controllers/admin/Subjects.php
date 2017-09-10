<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {

	public function index()
	{
		//Load template
		$this->template->load('admin', 'default', 'subjects/index');
	}

	public function add()
	{
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

	public function edit()
	{
		//Load template
		$this->template->load('admin', 'default', 'subjects/edit');
	}

	public function delete()
	{
		
	}
}
