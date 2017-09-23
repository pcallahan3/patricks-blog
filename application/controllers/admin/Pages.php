
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
	Pages controller
*/
class Pages extends Admin_Controller {

	function __construct(){

		parent::__construct();

		//Check login
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}

	}
	//Index pages functionality
	public function index(){

		//Get a list of all pages with the get_list() in the page_model 
		$data['pages'] = $this->Page_model->get_list();

		//Load template and pass pages index into template
		$this->template->load('admin', 'default', 'pages/index', $data);
	}

	//Index pages functionality
	public function test_index(){

		//Get a list of all pages with the get_list() in the page_model 
		$data['users'] = $this->User_model->get_list();

		//Load template and pass pages index into template
		$this->template->load('admin', 'default', 'pages/test_index', $data);
		
	}

	//Add pages functionality
	public function add(){
		//Field Rules
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('subject_id', 'Subject', 'trim|required');
		$this->form_validation->set_rules('body1', 'Body1', 'trim|required');
		$this->form_validation->set_rules('body2', 'Body2', 'trim|required');
		$this->form_validation->set_rules('is_published', 'Published', 'required');
		$this->form_validation->set_rules('is_featured', 'Feature', 'required');
		$this->form_validation->set_rules('order', 'Order', 'integer');
		

		if($this->form_validation->run() == False){

			$subject_options = array();
			$subject_options[0] = 'Select Subject';

			$subject_list = $this->Subject_model->get_list();

			foreach($subject_list as $subject){
				$subject_options[$subject->id] = $subject->name;
			}

			$data['subject_options'] = $subject_options;


			//Load template
			$this->template->load('admin', 'default', 'pages/add', $data);
		}
		else{
			$slug = str_replace(' ', '-', $this->input->post('title'));
			$slug = strtolower($slug);

			//Page data array
			$data = array(
					'title' 		=> $this->input->post('title'),
					'slug'  		=> $slug,
					'subject_id'    => $this->input->post('subject_id'),
					'body1'          => $this->input->post('body1'),
					'body2'          => $this->input->post('body2'),
					'is_published'  => $this->input->post('is_published'),
					'is_featured'   => $this->input->post('is_featured'),
					'in_menu'       => $this->input->post('in_menu'),
					'user_id'  		=> $this->session->userdata('user_id'),
					'order'         => $this->input->post('order')

			);

			//Insert Page
			$this->Page_model->add($data);


			//Activity array
			$data = array(
					'resource_id' => $this->db->insert_id(),
					'type' => 'page',
					'action' => 'added', 
					'user_id' =>  $this->session->userdata('user_id'),
					'message' => 'A new page was added ('.$data["title"].')'

			);

			//Insert activity into activity table
			$this->Activity_model->add($data);

			//Set message 
			$this->session->set_flashdata('success', 'Page has been added');

			//Redirect to admin/pages
			redirect('admin/pages');
		}

		
	}

	//Edit pages functionalilty
	public function edit($id){
		//Field Rules
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('subject_id', 'Subject', 'trim|required');
		$this->form_validation->set_rules('body1', 'Body1', 'trim|required');
		$this->form_validation->set_rules('body2', 'Body2', 'trim|required');
		$this->form_validation->set_rules('is_published', 'Published', 'required');
		$this->form_validation->set_rules('is_featured', 'Feature', 'required');
		$this->form_validation->set_rules('order', 'Order', 'integer');
		

		if($this->form_validation->run() == False){

			$data['item'] = $this->Page_model->get($id);

			$subject_options = array();
			$subject_options[0] = 'Select Subject';

			$subject_list = $this->Subject_model->get_list();

			foreach($this->Subject_model->get_list() as $subject){
				$subject_options[$subject->id] = $subject->name;
			}

			$data['subject_options'] = $subject_options;

			//Load template
			$this->template->load('admin', 'default', 'pages/edit', $data);
			
			
		}
		else{
			$slug = str_replace(' ', '-', $this->input->post('title'));
			$slug = strtolower($slug);

			//Page data array
			$data = array(
					'title' 		=> $this->input->post('title'),
					'slug'  		=> $slug,
					'subject_id'    => $this->input->post('subject_id'),
					'body1'          => $this->input->post('body1'),
					'body2'          => $this->input->post('body2'),
					'is_published'  => $this->input->post('is_published'),
					'is_featured'   => $this->input->post('is_featured'),
					'in_menu'       => $this->input->post('in_menu'),
					'user_id'  		=> $this->session->userdata('user_id'),
					'order'         => $this->input->post('order')

			);

			//Update Page
			$this->Page_model->update($id, $data);


			//Activity array
			$data = array(
					'resource_id' => $this->db->insert_id(),
					'type' => 'page',
					'action' => 'updated', 
					'user_id' =>  $this->session->userdata('user_id'),
					'message' => 'A page was updated ('.$data["title"].')'

			);

			//Insert activity into activity table
			$this->Activity_model->add($data);

			//Set message 
			$this->session->set_flashdata('success', 'Page has been updated');

			//Redirect to admin/pages
			redirect('admin/pages');

		
		}
	}

	//Delete pages functionalilty
	public function delete($id){
			//Get the $id title 
			$title = $data['item'] = $this->Page_model->get($id)->title;

			//Delete the page
			$this->Page_model->delete($id);

			//Activity array
			$data = array(
					'resource_id' => $this->db->insert_id(),
					'type' => 'page',
					'action' => 'deleted', 
					'user_id' =>  $this->session->userdata('user_id'),
					'message' => 'A page was deleted'

			);

			//Insert activity into activity table
			$this->Activity_model->add($data);

			//Set message 
			$this->session->set_flashdata('success', 'Page has been deleted');

			//Redirect to admin/subject
			redirect('admin/pages');
		
	}
}
