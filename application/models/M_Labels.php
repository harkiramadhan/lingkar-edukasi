<?php
class M_Labels extends CI_Model{
    function getAll(){
        return $this->db->order_by('id', "DESC")->get('labels');
    }

    function getActive(){
        return $this->db->order_by('id', "DESC")->get_where('labels', ['status' => 1]);
    }

    function getById($id){
        return $this->db->get_where('labels', ['id' => $id])->row();
    }

    function getByCourse($courseid){
        return $this->db->select('l.label')
                        ->from('courses_label cl')
                        ->join('labels l', 'cl.labelid = l.id')
                        ->where([
                            'cl.courseid' => $courseid
                        ])->get();
    }
}