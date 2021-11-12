<?php
class Teacher_all_courses_model extends CI_Model {

    function getCourses($data){

        return $this->db->query("SELECT * FROM courses WHERE course_id = ".$this->db->escape($data)." ")->result_array();
    }

    function getCourse($course_id){

        return $this->db->query("SELECT * FROM courses WHERE course_id = ".$course_id." ")->row_array(0,"array");
    }

    function addCourse($data,$teacher_id){

        $this->db->query("INSERT INTO courses SET course_name='".$data['course_name']."' , course_description='".$data['course_description']."', course_short_desc='".$data['course_short_desc']."', course_is_active=1");

        $id = $this->db->query("SELECT course_id FROM courses WHERE course_name='".$data['course_name']."' ")->row_array(0,"array");


        $this->db->query("INSERT INTO given_courses SET course_id='".$id['course_id']."' , teacher_id=".$teacher_id." ");

    }


    function deleteCourse($course_id){

        $this->db->query("DELETE FROM courses WHERE course_id = ".$course_id." ");

    }

}
?>