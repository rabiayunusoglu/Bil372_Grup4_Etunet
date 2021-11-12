<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

	

	public function index()
	{	
		if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model('Login_model');

				$this->load->model('Courses_model');

				$this->load->model('Posts_model');

				$data['subview'] = "dashboard";

				if($this->session->userdata['admin']['type'] === 'teacher'){

					$data['courses'] = $this->Login_model->getCoursesOfTeacher($this->session->userdata['admin']['teacher_id']);
					if(empty($data['courses'])){
						redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Teacher_courses','refresh');
					}
					else{
						if(isset($this->session->userdata['admin']['current_course_id'])){

							$data['current_course'] = $this->Courses_model->getCourseWithId($this->session->userdata['admin']['current_course_id'])[0];

							$data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
						}
						else{
							$admin = $this->session->userdata['admin'];
							$admin['current_course_id']  = $data['courses'][0]['course_id'];
							$this->session->set_userdata('admin',$admin);
						    $data['current_course'] = $data['courses'][0];
						    $data['posts'] = $this->Posts_model->getPostsOfCourse($data['courses'][0]['course_id']);
						}
						
					}
					$data['type'] = 'teacher';
					 $data['added_id'] = $this->session->userdata['admin']['admin_id'];
				}

			else{
				$data['courses'] = $this->Login_model->getCoursesOfStudent($this->session->userdata['admin']['student_id']);
				if(empty($data['courses'])){
						redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Courses','refresh');
					}
					else{
						if(isset($this->session->userdata['admin']['current_course_id'])){

							$data['current_course'] = $this->Courses_model->getCourseWithId($this->session->userdata['admin']['current_course_id'])[0];

							$data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
						}
						else{
							$admin = $this->session->userdata['admin'];
							$admin['current_course_id']  = $data['courses'][0]['course_id'];
							$this->session->set_userdata('admin',$admin);
						    $data['current_course'] = $data['courses'][0];
						    $data['posts'] = $this->Posts_model->getPostsOfCourse($data['courses'][0]['course_id']);
						}
						
					}
				$data['type'] = 'student';
				$data['added_id'] = $this->session->userdata['admin']['admin_id'];
			}
          $data['subview'] = "dashboard";
    	    $this->load->view('layouts/standart',$data);

		}
    	else{
      		redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
    	}
	}

	public function set_course($course_id){
		$admin = $this->session->userdata['admin'];
		$admin['current_course_id']  = $course_id;
		$this->session->set_userdata('admin',$admin);
		redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Dashboard','refresh');
	}
}

?>

