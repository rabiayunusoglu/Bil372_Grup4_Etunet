<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_resource extends CI_Controller {

	

	public function index()
	{	
			if(isset($this->session->userdata['admin']['admin_id'])){

				$this->load->model("Resource_Student_model");
	    
				$this->load->model("Courses_model");

				$this->load->model("Posts_model");

				$this->load->model("Login_model");

	    		if($this->session->userdata['admin']['type'] === 'student'){

	    			if(!isset($this->session->userdata['admin']['current_course_id'])){
						
						$resources = array();
						$data['posts'] = array();
					}
					else{
						$resources = $this->Resource_Student_model->getResources($this->session->userdata['admin']['current_course_id']);
						$data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
					}
					

					$data['resources'] = $resources;
					$data['courses'] = $this->Login_model->getCoursesOfStudent($this->session->userdata['admin']['student_id']);
					$data['subview'] = "resource_list_student";
					$data['type'] = 'student';
					$data['added_id'] = $this->session->userdata['admin']['admin_id'];
					$this->load->view('layouts/standart',$data);

				}
				
		   }
		    else{
		      redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		    }
	    	

	}

	
public function add_resource(){

	  $this->load->model("Login_model");
	  $this->load->model("Posts_model");
	  $data['courses'] = $this->Login_model->getCoursesOfStudent($this->session->userdata['admin']['student_id']);
	  $data['subview'] = "add_resource_student";
	  $data['type'] = 'student';
	  $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
	  $data['added_id'] = $this->session->userdata['admin']['admin_id'];

	  $this->load->view('layouts/standart',$data);

	}

	public function handle_resource(){

		if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model("Resource_Student_model");

			$resource = $this->input->post();
			$data = $this->session->userdata['admin']['admin_id'];

			$course_id = $this->session->userdata['admin']['current_course_id'];

			$this->Resource_Student_model->addResource($resource,$course_id,$data);

			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Student_resource','refresh');

			
		}
		else{
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		}
	  

	}

	public function update_resource($hmw_id){

	  $this->load->model("Resource_Student_model");
	  $this->load->model("Posts_model");

	  $resource = $this->Resource_Student_model->getResource($hmw_id);

	  $data['resource'] = $resource;

	  $this->load->model("Login_model");
	  $data['courses'] = $this->Login_model->getCoursesOfStudent($this->session->userdata['admin']['student_id']);
	  $data['subview'] = "update_resource_student";
	  $data['type'] = 'student';
	  $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
	  $data['added_id'] = $this->session->userdata['admin']['admin_id'];

	  $this->load->view('layouts/standart',$data);

	}

	public function handle_update($hmw_id){

		if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model("Resource_Student_model");

			$resource = $this->input->post();

			$course_id = $this->session->userdata['admin']['current_course_id'];

			$this->Resource_Student_model->updateResource($resource,$course_id,$hmw_id);

			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Student_resource','refresh');

			
		}
		else{
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		}
	  

	}

	public function delete_resource($hmw_id){

		if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model("Resource_Student_model");

			$this->Resource_Student_model->deleteResource($hmw_id);

			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Student_resource','refresh');

			
		}
		else{
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		}
	  

	}



}

?>
