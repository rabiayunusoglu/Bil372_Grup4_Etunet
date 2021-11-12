<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Teacher_courses extends CI_Controller {



    public function index()
    {
        if(isset($this->session->userdata['admin']['admin_id'])){

            $this->load->model("Teacher_all_courses_model");

            $this->load->model("Posts_model");

            $this->load->model("Login_model");

            if($this->session->userdata['admin']['type'] === 'teacher'){

                if(!isset($this->session->userdata['admin']['current_course_id'])){
                        $data['posts'] = array();

                        $data['course'] = array();
                }
                else{
                        $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
                        $cources = $this->Teacher_all_courses_model->getCourses($this->session->userdata['admin']['current_course_id']);

                        $data['course'] = $cources;
                }

                
                $data['courses'] = $this->Login_model->getCoursesOfTeacher($this->session->userdata['admin']['teacher_id']);
                $data['subview'] = "teacher_all_courses_list";
                $data['type'] = 'teacher';
                
                $data['added_id'] = $this->session->userdata['admin']['admin_id'];
                $this->load->view('layouts/standart',$data);

            }

        }
        else{
            redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
        }


    }


    public function handle_course(){

        if(isset($this->session->userdata['admin']['admin_id'])){

            $this->load->model("Teacher_all_courses_model");

            $course = $this->input->post();

            $this->session->userdata['admin']['admin_id'];


            $this->Teacher_all_courses_model->addCourse($course,$this->session->userdata['admin']['admin_id']);

            redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Teacher_courses','refresh');


        }
        else{
            redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
        }


    }



    public function add_all_course(){

        $this->load->model("Posts_model");
        $this->load->model("Login_model");
        $data['courses'] = $this->Login_model->getCoursesOfTeacher($this->session->userdata['admin']['teacher_id']);
        $data['subview'] = "add_all_course";
        $data['type'] = 'teacher';
        $data['added_id'] = $this->session->userdata['admin']['admin_id'];

        if(!isset($this->session->userdata['admin']['current_course_id'])){
            $data['posts'] = array();
        }
        else{
            $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
        }

        
        
        $this->load->view('layouts/standart',$data);

    }





}

?>

