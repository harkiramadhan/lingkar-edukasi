<?php
class M_Benefit_Landing extends CI_Model{
    function getAll(){
        return $this->db->get('benefit_landing');
    }

    function getById($id){
        return $this->db->get_where('benefit_landing', ['id' => $id])->row();
    }

    function getActive(){
        return $this->db->get_where('benefit_landing', ['status' => 1]);
    }
}