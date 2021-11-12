<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_homework extends CI_Controller {

	

	public function index()
	{	
			if(isset($this->session->userdata['admin']['admin_id'])){

				$this->load->model("Homework_model");
	    
				$this->load->model("Courses_model");

				$this->load->model("Login_model");

				$this->load->model("Posts_model");


	    		if($this->session->userdata['admin']['type'] === 'student'){
	    			
	    			if(!isset($this->session->userdata['admin']['current_course_id'])){
						
						$homeworks = array();
						$data['posts'] = array();
					}
					else{
						$homeworks = $this->Homework_model->getHomeworks($this->session->userdata['admin']['current_course_id']);
						$data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
					}

					

					$data['homeworks'] = $homeworks;
					$data['courses'] = $this->Login_model->getCoursesOfStudent($this->session->userdata['admin']['student_id']);
					$data['subview'] = "homework_list_student";
					$data['type'] = 'student';
					
					$data['added_id'] = $this->session->userdata['admin']['admin_id'];
					
					$this->load->view('layouts/standart',$data);

				}
				
		   }
		    else{
		      redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		    }
	    	

	}

	

	public function detail_homework($hmw_id){

	  $this->load->model("Homework_model");
	  $this->load->model("Posts_model");

	  $homework = $this->Homework_model->getHomework($hmw_id);

	  $data['homework'] = $homework;

	  $this->load->model("Login_model");
	  $data['courses'] = $this->Login_model->getCoursesOfStudent($this->session->userdata['admin']['student_id']);
	  $data['subview'] = "detail_homework";
	  $data['type'] = 'student';
      $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
      $data['added_id'] = $this->session->userdata['admin']['admin_id'];
      $this->load->view('layouts/standart',$data);

	}

	public function handle_detail($hmw_id){

		if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model("Homework_model");

			$homework = $this->input->post();

			$course_id = $this->session->userdata['admin']['current_course_id'];

			$this->Homework_model->updateHomework($homework,$course_id,$hmw_id);

			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Student_homework','refresh');

			
		}
		else{
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		}
	  

	}

}

?>

