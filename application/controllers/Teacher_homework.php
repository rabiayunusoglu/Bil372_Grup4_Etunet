<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Teacher_homework extends CI_Controller {

	

	public function index()
	{	
			if(isset($this->session->userdata['admin']['admin_id'])){

				$this->load->model("Homework_model");
	    
				$this->load->model("Courses_model");

				$this->load->model("Posts_model");

				$this->load->model("Login_model");

	    		if($this->session->userdata['admin']['type'] === 'teacher'){
	    			
	    			if(!isset($this->session->userdata['admin']['current_course_id'])){
                        $data['posts'] = array();

                        $data['homeworks'] = array();
	                }
	                else{
	                        $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
	                        $homeworks = $this->Homework_model->getHomeworks($this->session->userdata['admin']['current_course_id']);

							$data['homeworks'] = $homeworks;
	                }

					
					$data['courses'] = $this->Login_model->getCoursesOfTeacher($this->session->userdata['admin']['teacher_id']);
					$data['subview'] = "homework_list";
					$data['type'] = 'teacher';
					$data['added_id'] = $this->session->userdata['admin']['admin_id'];
					$this->load->view('layouts/standart',$data);

				}
				
		   }
		    else{
		      redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		    }
	    	

	}

	public function add_homework(){

	  $this->load->model("Login_model");
	  $this->load->model("Posts_model");
	  $data['courses'] = $this->Login_model->getCoursesOfTeacher($this->session->userdata['admin']['teacher_id']);
	  $data['subview'] = "add_homework";
	  $data['type'] = 'teacher';
	  $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
	  $data['added_id'] = $this->session->userdata['admin']['admin_id'];
	  $this->load->view('layouts/standart',$data);

	}

	public function handle_homework(){

		if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model("Homework_model");

			$homework = $this->input->post();

			$course_id = $this->session->userdata['admin']['current_course_id'];

			$this->Homework_model->addHomework($homework,$course_id);

			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Teacher_homework','refresh');

			
		}
		else{
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		}
	  

	}

	public function update_homework($hmw_id){

	  $this->load->model("Homework_model");
	  $this->load->model("Posts_model");

	  $homework = $this->Homework_model->getHomework($hmw_id);

	  $data['homework'] = $homework;

	  $this->load->model("Login_model");
	  $data['courses'] = $this->Login_model->getCoursesOfTeacher($this->session->userdata['admin']['teacher_id']);
	  $data['subview'] = "update_homework";
	  $data['type'] = 'teacher';
	  $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
	  $data['added_id'] = $this->session->userdata['admin']['admin_id'];
	  $this->load->view('layouts/standart',$data);

	}

	public function handle_update($hmw_id){

		if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model("Homework_model");

			$homework = $this->input->post();

			$course_id = $this->session->userdata['admin']['current_course_id'];

			$this->Homework_model->updateHomework($homework,$course_id,$hmw_id);

			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Teacher_homework','refresh');

			
		}
		else{
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		}
	  

	}

	public function delete_homework($hmw_id){

		if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model("Homework_model");

			$this->Homework_model->deleteHomework($hmw_id);

			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Teacher_homework','refresh');

			
		}
		else{
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		}
	  

	}



}

?>

