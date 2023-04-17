<?php
class M_Settings extends CI_Model{
    function get(){
        return $this->db->get_where('setting', ['id' => 1])->row();
    }
}