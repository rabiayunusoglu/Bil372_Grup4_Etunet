<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Teacher_resource extends CI_Controller {

	

	public function index()
	{	
			if(isset($this->session->userdata['admin']['admin_id'])){

				$this->load->model("Resource_model");
	    
				$this->load->model("Courses_model");

				$this->load->model("Posts_model");

				$this->load->model("Login_model");

	    		if($this->session->userdata['admin']['type'] === 'teacher'){

	    			if(!isset($this->session->userdata['admin']['current_course_id'])){
                        $data['posts'] = array();

                        $data['resources'] = array();
	                }
	                else{
	                        $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
	                        $resources = $this->Resource_model->getResources($this->session->userdata['admin']['current_course_id']);

							$data['resources'] = $resources;
	                }

					
					$data['courses'] = $this->Login_model->getCoursesOfTeacher($this->session->userdata['admin']['teacher_id']);
					$data['subview'] = "resource_list";
					$data['type'] = 'teacher';
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
	  $data['courses'] = $this->Login_model->getCoursesOfTeacher($this->session->userdata['admin']['teacher_id']);
	  $data['subview'] = "add_resource";
	  $data['type'] = 'teacher';
	  $data['added_id'] = $this->session->userdata['admin']['admin_id'];

	  $this->load->model("Posts_model");
	  $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
	  $this->load->view('layouts/standart',$data);

	}

	public function handle_resource(){

		if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model("Resource_model");

			$resource = $this->input->post();

			$course_id = $this->session->userdata['admin']['current_course_id'];

			$this->Resource_model->addResource($resource,$course_id,$this->session->userdata['admin']['admin_id']);

			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Teacher_resource','refresh');

			
		}
		else{
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		}
	  

	}

	public function update_resource($resource_id){

	  $this->load->model("Resource_model");

	  $resource = $this->Resource_model->getResource($resource_id);

	  $data['resource'] = $resource;

	  $this->load->model("Login_model");
	  $data['courses'] = $this->Login_model->getCoursesOfTeacher($this->session->userdata['admin']['teacher_id']);
	  $data['subview'] = "update_resource";
	  $data['type'] = 'teacher';
	  $data['added_id'] = $this->session->userdata['admin']['admin_id'];
	  $this->load->model("Posts_model");
	  $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);

	  $this->load->view('layouts/standart',$data);

	}

	public function handle_update($resource_id){

		if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model("Resource_model");

			$resource = $this->input->post();

			$course_id = $this->session->userdata['admin']['current_course_id'];

			$this->Resource_model->updateResource($resource,$course_id,$resource_id);

			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Teacher_resource','refresh');

			
		}
		else{
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		}
	  

	}

	public function delete_resource($resource_id){

		if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model("Resource_model");

			$this->Resource_model->deleteResource($resource_id);

			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Teacher_resource','refresh');

			
		}
		else{
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		}
	  

	}



}

?>

