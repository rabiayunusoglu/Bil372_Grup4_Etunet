<?php 
    class Resource_Student_model extends CI_Model {
        
        function getResources($data){

            return $this->db->query("SELECT * FROM resources WHERE resource_course_id = ".$this->db->escape($data)." ")->result_array();
        }

        function getResource($hmw_id){

            return $this->db->query("SELECT * FROM resources WHERE resource_id = ".$hmw_id." ")->row_array(0,"array");
        }

        function addResource($data,$course_id,$added_id){

            $this->db->query("INSERT INTO resources SET resource_short_desc=".$this->db->escape($data['resource_short_desc'])." , resource_long_desc=".$this->db->escape($data['resource_long_desc']).",  resource_url=".$this->db->escape($data['resource_url']).", resource_course_id='".$course_id."',resource_student_id='".$added_id."' ");

        }

        function updateResource($hmw,$course_id,$hmw_id){

            $this->db->query("UPDATE resources SET resource_short_desc = ".$this->db->escape($hmw['resource_short_desc']).", resource_long_desc = ".$this->db->escape($hmw['resource_long_desc']).", resource_url=".$this->db->escape($hmw['resource_url'])." WHERE resource_course_id = '".$course_id."' AND resource_id = '".$hmw_id."'  ");
        }

        function deleteResource($hmw_id){

            $this->db->query("DELETE FROM resources WHERE resource_id = ".$hmw_id." ");
            
        }

    }
?>