<?php
class M_Admin extends CI_Model{
    function getUser($email){
        return $this->db->get_where('admin', ['email' => $email]);
    }
}