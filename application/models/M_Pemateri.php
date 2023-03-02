<?php
class M_Pemateri extends CI_Model{
    function getAll(){
        return $this->db->get('pemateri');
    }

    function getActive(){
        return $this->db->get_where('pemateri', ['status' => 1]);
    }

    function getById($id){
        return $this->db->get_where('pemateri', ['id' => $id])->row();
    }
}