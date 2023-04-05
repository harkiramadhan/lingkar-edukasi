<?php
class M_Users extends CI_Model{
    function getById($userid){
        return $this->db->get_where('user', ['id' => $userid])->row();
    }

    function getByEmail($email){
        return $this->db->get_where('user', ['email' => $email])->row();
    }

    function getAll(){
        return $this->db->get('user');
    }
}