<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Posts extends CI_Controller {

	public function index()
	{	


	}

	public function show_post($post_id)
	{	
	  if($this->session->userdata['admin']['type'] === 'teacher'){

		  $this->load->model("Login_model");
		  $this->load->model("Posts_model");

		  $data['post'] = $this->Posts_model->getPostWithId($post_id)[0];
		  $data['added_id'] = $this->session->userdata['admin']['admin_id'];


		  $data['courses'] = $this->Login_model->getCoursesOfTeacher($this->session->userdata['admin']['teacher_id']);
		  $data['subview'] = "show_post";
		  $data['type'] = 'teacher';
		  $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
		  $data['comments'] = $this->Posts_model->getCommentsWithPostId($post_id);


		  $data['real_comments'] = array();
		  $counter = 0;
		  foreach ($data['comments'] as $comment) {
		  	
		  	if($comment['comment_added_type'] === 'teacher'){

		  		$data['real_comments'][$counter] = $comment;
		  		$data['real_comments'][$counter]['teacher'] = $this->Login_model->getTeacherWithId($comment['comment_added_id']); 

		  		
		  	}
		  	else{
		  		$data['real_comments'][$counter] = $comment;
		  		$data['real_comments'][$counter]['student'] = $this->Login_model->getStudentWithId($comment['comment_added_id']); 
		  	}

		  	$counter++;

		  }

		  $this->load->view('layouts/standart',$data);
	   }
	   else if($this->session->userdata['admin']['type'] === 'student'){

		  $this->load->model("Login_model");
		  $this->load->model("Posts_model");

		  $data['post'] = $this->Posts_model->getPostWithId($post_id)[0];
		  $data['added_id'] = $this->session->userdata['admin']['admin_id'];

		  $data['courses'] = $this->Login_model->getCoursesOfStudent($this->session->userdata['admin']['student_id']);
		  $data['subview'] = "show_post";
		  $data['type'] = 'student';
		  $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
		  $data['comments'] = $this->Posts_model->getCommentsWithPostId($post_id);

		  $data['real_comments'] = array();
		  $counter = 0;
		  foreach ($data['comments'] as $comment) {
		  	
		  	if($comment['comment_added_type'] === 'teacher'){

		  		$data['real_comments'][$counter] = $comment;
		  		$data['real_comments'][$counter]['teacher'] = $this->Login_model->getTeacherWithId($comment['comment_added_id']); 

		  		
		  	}
		  	else{
		  		$data['real_comments'][$counter] = $comment;
		  		$data['real_comments'][$counter]['student'] = $this->Login_model->getStudentWithId($comment['comment_added_id']); 
		  	}

		  	$counter++;

		  }

		  $this->load->view('layouts/standart',$data);
	   }
	}

	public function add_post(){
	  $this->load->model("Posts_model");
	  $this->load->model("Login_model");

	  if($this->session->userdata['admin']['type'] === 'teacher'){
		  $data['courses'] = $this->Login_model->getCoursesOfTeacher($this->session->userdata['admin']['teacher_id']);
		  $data['subview'] = "add_post";
		  $data['type'] = 'teacher';
		  $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
		  $data['added_id'] = $this->session->userdata['admin']['admin_id'];
	  }
	  else if($this->session->userdata['admin']['type'] === 'student'){
		  $data['courses'] = $this->Login_model->getCoursesOfStudent($this->session->userdata['admin']['student_id']);
		  $data['subview'] = "add_post";
		  $data['type'] = 'student';
		  $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
		  $data['added_id'] = $this->session->userdata['admin']['admin_id'];

	  }

	  $this->load->view('layouts/standart',$data);

	}

	public function handle_post(){

		if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model("Posts_model");

			$post = $this->input->post();

			$added_id =  $this->session->userdata['admin']['admin_id'];

			$course_id = $this->session->userdata['admin']['current_course_id'];

			if($this->session->userdata['admin']['type'] === 'teacher'){
				$this->Posts_model->addPostTeacher($post,$course_id,$added_id);
			}
			else{
				$this->Posts_model->addPostStudent($post,$course_id,$added_id);
			}
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Dashboard','refresh');
		}
		else{
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		}
	  

	}

	public function update_post($post_id){

	  $this->load->model("Login_model");
	  $this->load->model("Posts_model");

	  if($this->session->userdata['admin']['type'] === 'teacher'){
		  $data['courses'] = $this->Login_model->getCoursesOfTeacher($this->session->userdata['admin']['teacher_id']);
		  $data['subview'] = "update_post";
		  $data['type'] = 'teacher';
		  $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
		  $data['added_id'] = $this->session->userdata['admin']['admin_id'];
	  }
	  else if($this->session->userdata['admin']['type'] === 'student'){
		  $data['courses'] = $this->Login_model->getCoursesOfStudent($this->session->userdata['admin']['student_id']);
		  $data['subview'] = "update_post";
		  $data['type'] = 'student';
		  $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
		  $data['added_id'] = $this->session->userdata['admin']['admin_id'];
	  }

      $data['post'] = $this->Posts_model->getPostWithId($post_id)[0];

	  $this->load->view('layouts/standart',$data);

	}

	public function handle_update($post_id){

		if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model("Posts_model");

			$post = $this->input->post();

			$course_id = $this->session->userdata['admin']['current_course_id'];

			$this->Posts_model->updatePost($post,$course_id,$post_id);

			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Dashboard','refresh');

			
		}
		else{
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		}
	  

	}

	public function delete_post($post_id){

		if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model("Posts_model");

			$this->Posts_model->deletePost($post_id);

			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Dashboard','refresh');

			
		}
		else{
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		}
	  

	}
	public function add_comment($post_id){
	  if(isset($this->session->userdata['admin']['admin_id'])){

	    $this->load->model("Posts_model");

	    $post = $this->input->post();

	    $added_id =  $this->session->userdata['admin']['admin_id'];

	    $added_type = $this->session->userdata['admin']['type'];

	    if($this->session->userdata['admin']['type'] === 'teacher'){
	      $this->Posts_model->addCommentTeacher($post,$post_id,$added_id,$added_type);
	    }
	    else{
	      $this->Posts_model->addCommentStudent($post,$post_id,$added_id,$added_type);
	    }
	    

	    redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Posts/show_post/'.$post_id.'','refresh');
	  }
	  else{
	    redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
	  }
	}
	public function delete_comment($comment_id,$post_id){
	  if(isset($this->session->userdata['admin']['admin_id'])){

	    $this->load->model("Posts_model");

	    $this->Posts_model->deleteComment($comment_id);

	    $redirect = 'http://localhost/Bil372_Grup4_Etunet/index.php/Posts/show_post/'.$post_id.'';

	    redirect($redirect,'refresh');
	  }
	  else{
	    redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
	  }
	}

	public function update_comment($comment_id,$post_id){

		if($this->session->userdata['admin']['type'] === 'teacher'){

		  $this->load->model("Login_model");
		  $this->load->model("Posts_model");

		  $data['post'] = $this->Posts_model->getPostWithId($post_id)[0];
		  $data['added_id'] = $this->session->userdata['admin']['admin_id'];
		  $data['courses'] = $this->Login_model->getCoursesOfTeacher($this->session->userdata['admin']['teacher_id']);
		  $data['subview'] = "update_comment";
		  $data['type'] = 'teacher';
		  $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
		  $data['comments'] = $this->Posts_model->getCommentsWithPostId($post_id);


		  $data['real_comments'] = array();
		  $counter = 0;
		  foreach ($data['comments'] as $comment) {
		  	
		  	if($comment['comment_added_type'] === 'teacher'){

		  		$data['real_comments'][$counter] = $comment;
		  		$data['real_comments'][$counter]['teacher'] = $this->Login_model->getTeacherWithId($comment['comment_added_id']); 

		  	}
		  	else{
		  		$data['real_comments'][$counter] = $comment;
		  		$data['real_comments'][$counter]['student'] = $this->Login_model->getStudentWithId($comment['comment_added_id']); 
		  	}

		  	$counter++;

		  }
		  $data['comment'] = $this->Posts_model->getCommentWithPostIdAndCommentId($post_id,$comment_id)[0];//$data['comment'] = $this->Posts_model->getCommentsWithPostId($post_id)[0];
		  $this->load->view('layouts/standart',$data);
	   }
	   else if($this->session->userdata['admin']['type'] === 'student'){

		  $this->load->model("Login_model");
		  $this->load->model("Posts_model");

		  $data['post'] = $this->Posts_model->getPostWithId($post_id)[0];
		  $data['added_id'] = $this->session->userdata['admin']['admin_id'];
		  $data['courses'] = $this->Login_model->getCoursesOfStudent($this->session->userdata['admin']['student_id']);
		  $data['subview'] = "update_comment";
		  $data['type'] = 'student';
		  $data['posts'] = $this->Posts_model->getPostsOfCourse($this->session->userdata['admin']['current_course_id']);
		  $data['comments'] = $this->Posts_model->getCommentsWithPostId($post_id);

		  $data['real_comments'] = array();
		  $counter = 0;
		  foreach ($data['comments'] as $comment) {
		  	
		  	if($comment['comment_added_type'] === 'teacher'){

		  		$data['real_comments'][$counter] = $comment;
		  		$data['real_comments'][$counter]['teacher'] = $this->Login_model->getTeacherWithId($comment['comment_added_id']); 
		  	}
		  	else{
		  		$data['real_comments'][$counter] = $comment;
		  		$data['real_comments'][$counter]['student'] = $this->Login_model->getStudentWithId($comment['comment_added_id']); 
		  	}

		  	$counter++;

		  }
		  $data['comment'] = $this->Posts_model->getCommentWithPostIdAndCommentId($post_id,$comment_id)[0];

		  $this->load->view('layouts/standart',$data);
	   }
	}	
	
	public function handle_comment_update($comment_id,$post_id){
		if(isset($this->session->userdata['admin']['admin_id'])){

			$this->load->model("Login_model");
		    $this->load->model("Posts_model");

			$post = $this->input->post();

			$this->Posts_model->updateComment($post,$comment_id);

			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Posts/show_post/'.$post_id.'','refresh');

			
		}
		else{
			redirect('http://localhost/Bil372_Grup4_Etunet/index.php/Enterence','refresh');
		}
	}
}




?>

