<?php
class M_Benefit extends CI_Model{
    function getAll(){
        return $this->db->get('benefit');
    }

    function getActive(){
        return $this->db->get_where('benefit', ['status' => 1]);
    }

    function getById($id){
        return $this->db->get_where('benefit', ['id' => $id])->row();
    }

    function getByCourse($courseid){
        return $this->db->select('b.*')
                        ->from('courses_benefit cb')
                        ->join('benefit b', 'cb.benefitid = b.id')
                        ->where([
                            'cb.courseid' => $courseid
                        ])->get();
    }
}