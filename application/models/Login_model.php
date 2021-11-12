<?php 
    class Login_model extends CI_Model {
        
        function getStudent($data){

            return $this->db->query("SELECT * FROM students WHERE student_mail=".$this->db->escape($data['mail'])." AND student_password='".$data['password']."'LIMIT 1")->row_array(0,"array");
        }

        function getStudentWithId($data){

            return $this->db->query("SELECT * FROM students WHERE student_id=".$data." LIMIT 1")->row_array(0,"array");
        }

        function getTeacherWithId($data){

            return $this->db->query("SELECT * FROM teachers WHERE teacher_id=".$data." LIMIT 1")->row_array(0,"array");
        }


        function getStudents(){

            return $this->db->query("SELECT * FROM students")->result_array();
        }

        function addStudent($data){

            $this->db->query("INSERT INTO students SET student_name='".$data['name']."' , student_password='".$data['password']."', student_mail='".$data['mail']."'");
        }

        function getTeacher($data){

            return $this->db->query("SELECT * FROM teachers WHERE teacher_mail=".$this->db->escape($data['mail'])." AND teacher_password='".$data['password']."'LIMIT 1")->row_array(0,"array");
        }
        function getTeachers(){

            return $this->db->query("SELECT * FROM teachers")->result_array();
        }

        function addTeacher($data){

            $this->db->query("INSERT INTO teachers SET teacher_name='".$data['name']."' , teacher_password='".$data['password']."', teacher_mail='".$data['mail']."'");
        }

        function getCoursesOfTeacher($id){

            return $this->db->query("SELECT * FROM courses INNER JOIN given_courses ON courses.course_id = given_courses.course_id WHERE given_courses.teacher_id ='".$id."' ")->result_array();

        }
        function getCoursesOfStudent($id){

            return $this->db->query("SELECT * FROM courses INNER JOIN taken_courses ON courses.course_id = taken_courses.course_id WHERE taken_courses.student_id ='".$id."' ")->result_array();

        }

    }
?>
