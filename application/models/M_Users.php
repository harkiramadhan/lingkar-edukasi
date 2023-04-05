<?php
class M_Users extends CI_Model{
    function getById($userid){
        return $this->db->get_where('user', ['id' => $userid])->row();
    }
}