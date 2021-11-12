<?php
class Resource_model extends CI_Model {

    function getResources($data){

        return $this->db->query("SELECT * FROM resources WHERE resource_course_id = ".$this->db->escape($data)." ")->result_array();
    }

    function getResource($resource_id){

        return $this->db->query("SELECT * FROM resources WHERE resource_id = ".$resource_id." ")->row_array(0,"array");
    }

    function addResource($data,$course_id,$added_id){

        $this->db->query("INSERT INTO resources SET resource_short_desc=".$this->db->escape($data['resource_short_desc'])." , resource_long_desc=".$this->db->escape($data['resource_long_desc']).",  resource_url=".$this->db->escape($data['resource_url']).", resource_course_id='".$course_id."',resource_teacher_id='".$added_id."' ");

    }

    function updateResource($resoruce,$course_id,$resource_id){

        $this->db->query("UPDATE resources SET resource_short_desc = ".$this->db->escape($resoruce['resource_short_desc']).", resource_long_desc = ".$this->db->escape($resoruce['resource_long_desc']).", resource_url=".$this->db->escape($resoruce['resource_url'])." WHERE resource_course_id = '".$course_id."' AND resource_id = '".$resource_id."'  ");
    }

    function deleteResource($resource_id){

        $this->db->query("DELETE FROM resources WHERE resource_id = ".$resource_id." ");

    }

}
?>