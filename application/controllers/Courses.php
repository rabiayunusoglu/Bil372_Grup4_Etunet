<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Courses extends CI_Controller {

	

	public function index()
	{	
			if(isset($this->session->userdata['admin']['admin_id'])){

				$this->load->model("Courses_model");
	    		$this->load->model("Posts_model");
	    		$this->load->model('Login_model');


	    		if($this->session->userdata['admin']['type'] === 'teacher'){
	    			
					$courses = $this->session->userdata['admin']['courses'];

					if(empty($courses)){

						$data['subview'] = "empty_teacher_courses";
						
					}
					else{
						$data['subview'] = "courses_teacher";
					}

					
					$data["title"]= "Profil";


					$data['added_id'] = $this->session->userdata['admin']['admin_id'];
				
					$this->load->view('layouts/standart',$data);

				}
				else{

					$courses = $this->Courses_model->getCoursesOfStudentWithId($this->session->userdata['admin']['student_id']);

					$data['courses'] = $courses;
					$data['subview'] = "courses_list";
					$data['type'] = 'student';

					$all_courses = $this->Courses_model->get_notEnrolled_Courses($this->session->userdata['admin']['student_id']);

					$data['all_courses'] = $all_courses;
					$data['subview'] = "courses_list";


					if(!isset($this->session->userdata['admin']['current_course_id'])){
						$data['posts'] = array();
					}
					else{
						$data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
					}


					$data['added_id'] = $this->session->userdata['admin']['admin_id'];
					$this->load->view('layouts/standart',$data);

				}
		   }
		    else{
		      redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		    }
	}

	public function add_course(){
	  $data['title'] = "Add Course";
	  $data['subview'] = "add_course";
	  $this->load->view('layouts/standart',$data);
	}

	public function real_add_course(){

		if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model("Courses_model");

			$this->Courses_model->addCourse($this->input->post(),$this->session->userdata['admin']['admin_id']);

			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Courses','refresh');
		}
		else{
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		}
	}

	public function enroll_course($course_id){
	  if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model("Courses_model");

			$this->Courses_model->enrollcourse($course_id,$this->session->userdata['admin']['admin_id']);

			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Courses','refresh');
		}
		else{
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		}
	}

	public function drop_course($course_id){
	  if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model("Courses_model");

			$this->Courses_model->dropcourse($course_id,$this->session->userdata['admin']['admin_id']);

			$courses = $this->Courses_model->getCoursesOfStudentWithId($this->session->userdata['admin']['admin_id']);

			if(empty($courses)){
				unset($this->session->userdata['admin']['current_course_id']);
			}

			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Courses','refresh');
		}
		else{
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		}
	}
}

?>

