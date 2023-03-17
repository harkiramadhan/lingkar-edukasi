<?php
class M_Materi extends CI_Model{
    function getByClass($courseid){
        return $this->db->get_where('materi', ['courseid' => $courseid]);
    }
}