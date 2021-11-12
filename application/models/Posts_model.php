<?php 
    class Posts_model extends CI_Model {
        
        function getPostsOfCourse($data){

            return $this->db->query("SELECT * FROM posts WHERE post_course_id=".$data." ")->result_array();
        }
        function getPostsOfStudent($data){

            return $this->db->query("SELECT * FROM posts WHERE post_student_id=".$data." ")->result_array();
        }

        function getPostWithId($data){

            return $this->db->query("SELECT * FROM posts WHERE post_id=".$data." ")->result_array();
        }

        function addPostTeacher($data,$course_id,$added_id){

            $this->db->query("INSERT INTO posts SET post_short_desc=".$this->db->escape($data['post_short_desc'])." , post_long_desc=".$this->db->escape($data['post_long_desc']).", post_title=".$this->db->escape($data['post_title']).", post_date= CURRENT_TIMESTAMP() , post_course_id='".$course_id."', post_teacher_id='".$added_id."' ");

        }

        function updatePost($data,$course_id,$post_id){

            $this->db->query("UPDATE posts SET post_short_desc=".$this->db->escape($data['post_short_desc'])." , post_long_desc=".$this->db->escape($data['post_long_desc']).", post_title=".$this->db->escape($data['post_title']).", post_date= CURRENT_TIMESTAMP() WHERE post_course_id='".$course_id."' AND post_id='".$post_id."' ");

        }

        function addPostStudent($data,$course_id,$added_id){

            $this->db->query("INSERT INTO posts SET post_short_desc=".$this->db->escape($data['post_short_desc'])." , post_long_desc=".$this->db->escape($data['post_long_desc']).", post_title=".$this->db->escape($data['post_title']).", post_date= CURRENT_TIMESTAMP(), post_course_id='".$course_id."', post_student_id='".$added_id."' ");

        }

        function deletePost($post_id){

            $this->db->query("DELETE FROM posts WHERE post_id = ".$post_id." ");
            
        }

        function getCommentsWithPostId($post_id){
            return $this->db->query("SELECT * FROM comments WHERE comment_post_id = ".$post_id." ORDER BY comment_date ASC")->result_array();
        }
        function getAddedNameWithStudentId($post_id){
            return $this->db->query("SELECT student_name FROM students,comments,posts WHERE comment_post_id = ".$post_id." and comment_added_id = student_id ")->result_array();
        }
        function getAddedNameWithTeacherId($post_id){
            return $this->db->query("SELECT teacher_name FROM teachers,comments,posts WHERE comment_post_id = ".$post_id." and comment_added_id = teacher_id ")->result_array();
        }
        function addCommentTeacher($data,$post_id,$added_id,$added_type){
            $this->db->query("INSERT INTO comments SET comment_added_id='".$added_id."', comment_post_id='".$post_id."', comment_date=CURRENT_TIMESTAMP() , comment_desc=".$this->db->escape($data['comment_desc']).",comment_added_type='".$added_type."' ");
        }
        function addCommentStudent($data,$post_id,$added_id,$added_type){
            $this->db->query("INSERT INTO comments SET comment_added_id='".$added_id."', comment_post_id='".$post_id."', comment_date=CURRENT_TIMESTAMP() , comment_desc=".$this->db->escape($data['comment_desc']).",comment_added_type='".$added_type."'");
        }
        function deleteComment($comment_id){
            $this->db->query("DELETE FROM comments WHERE comment_id = ".$comment_id." ");
        }
        function updateComment($data,$comment_id){
            $this->db->query("UPDATE comments SET comment_desc=".$this->db->escape($data['comment_des'])." WHERE comment_id='".$comment_id."' ");
        }

        function getCommentWithPostIdAndCommentId($post_id,$comment_id){
            return $this->db->query("SELECT * FROM comments WHERE comment_post_id = ".$post_id." AND comment_id = ".$comment_id." ORDER BY comment_date ASC")->result_array();
        }

    }


?>