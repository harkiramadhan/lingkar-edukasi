<?php
class M_Admin extends CI_Model{
    function getUser($email){
        return $this->db->get_where('admin', ['email' => $email]);
    }

    function getById($id){
        return $this->db->get_where('admin', ['id' => $id])->row();
    }

    function getAll(){
        return $this->db->get('admin');
    }
}