<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enterence extends CI_Controller {

  public function index(){

   $this->load->model("Login_model");

    
    if(isset($this->session->userdata['admin']['admin_id'])){

      redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Dashboard','refresh');
    }
    else{

      if($this->input->post()){

        $admin;
        if($this->input->post()['drone'] == "stu"){

          $admin = $this->Login_model->getStudent($this->input->post());
        }
        else{
          $admin = $this->Login_model->getTeacher($this->input->post());
        }

        if(empty($admin)){
          $this->session->set_flashdata('error', 'Hatalı kullanıcı adı veya şifre girdiniz.');
          redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
        }
        else{

          if($this->input->post()['drone'] == "stu"){
            $admin = $this->Login_model->getStudent($this->input->post());
            $admin['admin_id'] = $admin['student_id'];
            $admin['type'] = "student";
            $admin['courses'] = $this->Login_model->getCoursesOfStudent($admin['student_id']);
          }
          else{
            
            $admin = $this->Login_model->getTeacher($this->input->post());
            $admin['admin_id'] = $admin['teacher_id'];
            $admin['type'] = "teacher";
            $admin['courses'] = $this->Login_model->getCoursesOfTeacher($admin['teacher_id']);
            
            
          }
          $this->session->set_userdata('admin',$admin);
          redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Dashboard','refresh');
        }
      }
      else{
        $this->load->view('layouts/login',$data);
      }
    }
  }

  public function out(){
    $this->session->sess_destroy();
    redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
  }
 
  public function signup_student(){
 
  $this->load->view('layouts/signup_student');

  }

  public function signup_teacher(){
  $data['title'] = "Sign Up";

  $this->load->model("Login_model");

  $this->load->view('layouts/signup_teacher',$data);

  }

  public function real_sign($num){
   $this->load->model("Login_model");

   if($num == 2){
    $admins=$this->Login_model->getTeachers();

    if($this->input->post()){

    $know=$this->input->post();

    $counter=0;

    foreach ($admins as $ad) {
      if($ad['teacher_mail']==$know['mail']){
        $counter++;
      }
    }

    if($counter!=0){
      redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence/signup_teacher','refresh');
    }
    else{
      $this->Login_model->addTeacher($know);
      redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
    }
  


   }
   else{
    redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence/signup_teacher','refresh');
   }
   }
   else{
    $admins=$this->Login_model->getStudents();

    if($this->input->post()){

    $know=$this->input->post();

    $counter=0;

    foreach ($admins as $ad) {
      if($ad['student_mail']==$know['mail']){
        $counter++;
      }
    }

    if($counter!=0){
      redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence/signup_student','refresh');
    }
    else{
      $this->Login_model->addStudent($know);
      redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
    }
  


   }
   else{
    redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence/signup_student','refresh');
   }
   }
   

  }

}