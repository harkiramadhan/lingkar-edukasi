<?php
class M_Tutor extends CI_Model{
    function getUser($email){
        return $this->db->get_where('tutor', ['email' => $email]);
    }

    function getById($id){
        return $this->db->get_where('tutor', ['id' => $id])->row();
    }

    function getAll(){
        return $this->db->get('tutor');
    }

    function getActive(){
        return $this->db->get_where('tutor', ['status' => 2]);
    }
}