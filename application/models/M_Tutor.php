<?php
class M_Tutor extends CI_Model{
    function getUser($email){
        return $this->db->get_where('tutor', ['email' => $email]);
    }
}