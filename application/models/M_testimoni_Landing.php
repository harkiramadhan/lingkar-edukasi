<?php
class M_Testimoni_Landing extends CI_Model{
    function getAll(){
        return $this->db->get('testimoni_landing');
    }

    function getById($id){
        return $this->db->get_where('testimoni_landing', ['id' => $id])->row();
    }

    function getActive(){
        return $this->db->get_where('testimoni_landing', ['status' => 1]);
    }
}