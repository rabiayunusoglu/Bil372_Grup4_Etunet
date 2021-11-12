<?php 
    class Courses_model extends CI_Model {
        
        function getCoursesOfTeacherWithId($data){

            return $this->db->query("SELECT * FROM given_courses WHERE teacher_id=".$this->db->escape($data)." ")->result_array();
        }

        function addCourse($data,$teacher_id){

            $this->db->query("INSERT INTO courses SET course_name='".$data['course_name']."' , course_description='".$data['course_description']."', course_short_desc='".$data['course_short_desc']."', course_is_active=1");

            $id = $this->db->query("SELECT course_id FROM courses WHERE course_name='".$data['course_name']."' ")->row_array(0,"array");


            $this->db->query("INSERT INTO given_courses SET course_id='".$id['course_id']."' , teacher_id=".$teacher_id." ");

        }
        function getCoursesOfStudentWithId($data){
          return $this->db->query("SELECT courses.* FROM courses, taken_courses WHERE courses.course_id = taken_courses.course_id and student_id=".$this->db->escape($data)." ")->result_array();
        }

        function getCourseWithId($id){

            return $this->db->query("SELECT * FROM courses WHERE course_id = '".$id."' ")->result_array();
        }

        function get_notEnrolled_Courses($data){

            return $this->db->query("SELECT courses.* FROM courses WHERE courses.course_id NOT IN(SELECT courses.course_id FROM taken_courses,courses WHERE courses.course_id = taken_courses.course_id and taken_courses.student_id=".$this->db->escape($data).") ")->result_array();
        }
        function enrollcourse($course_id,$student_id){

            $this->db->query("INSERT INTO taken_courses SET course_id=".$course_id.", student_id=".$student_id."");
        }
        function dropcourse($course_id,$student_id){

            $this->db->query("DELETE FROM taken_courses WHERE course_id=".$course_id." and student_id=".$student_id."");
        }

    }
?>