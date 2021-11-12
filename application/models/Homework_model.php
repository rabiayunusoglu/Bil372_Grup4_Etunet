<?php 
    class Homework_model extends CI_Model {
        
        function getHomeworks($data){

            return $this->db->query("SELECT * FROM homeworks WHERE homework_course_id = ".$this->db->escape($data)." ")->result_array();
        }

        function getHomework($hmw_id){

            return $this->db->query("SELECT * FROM homeworks WHERE homework_id = ".$hmw_id." ")->row_array(0,"array");
        }

        function addHomework($data,$course_id){

            $this->db->query("INSERT INTO homeworks SET homework_short_desc=".$this->db->escape($data['homework_short_desc'])." , homework_long_desc=".$this->db->escape($data['homework_long_desc']).",  resource_file=".$this->db->escape($data['resource_file']).", homework_course_id='".$course_id."' ");

        }

        function updateHomework($hmw,$course_id,$hmw_id){

            $this->db->query("UPDATE homeworks SET homework_short_desc = ".$this->db->escape($hmw['homework_short_desc']).", homework_long_desc = ".$this->db->escape($hmw['homework_long_desc']).", resource_file=".$this->db->escape($hmw['resource_file'])." WHERE homework_course_id = '".$course_id."' AND homework_id = '".$hmw_id."'  ");
        }

        function deleteHomework($hmw_id){

            $this->db->query("DELETE FROM homeworks WHERE homework_id = ".$hmw_id." ");
            
        }

    }
?>