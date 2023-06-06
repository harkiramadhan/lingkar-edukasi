<?php
class M_Reviews extends CI_Model{
    function getAll($pemateriid = false){
        if($pemateriid){
            $this->db->where('c.pemateriid', $pemateriid);
        }

        return $this->db->select('u.name, c.judul, r.*')
                        ->from('review r')
                        ->join('user u', 'r.userid = u.id')
                        ->join('courses c', 'r.courseid = c.id')
                        ->order_by('id', "DESC")->get();
    }

    function getById($id){
        return $this->db->select('u.name, c.judul, r.*')
                        ->from('review r')
                        ->join('user u', 'r.userid = u.id')
                        ->join('courses c', 'r.courseid = c.id')
                        ->where('r.id', $id)->get()->row();
    }

    function getByCourses($courseid, $limit = false){
        if($limit){
            $this->db->limit($limit);
        }

        return $this->db->select('u.name, c.judul, r.*')
                        ->from('review r')
                        ->join('user u', 'r.userid = u.id')
                        ->join('courses c', 'r.courseid = c.id')
                        ->where('r.courseid', $courseid)
                        ->order_by('id', "DESC")->get();
    }
}