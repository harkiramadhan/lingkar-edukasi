<?php
class M_Courses extends CI_Model{
    function getAll($userid = FALSE){
        if($userid){
            $this->db->where('c.pemateriid', $userid);
        }

        return $this->db->select('c.*, p.nama')
                        ->from('courses c')
                        ->join('tutor p', 'c.pemateriid = p.id', 'LEFT')
                        ->order_by('c.id', "DESC")->get();
    }

    function getActive($limit = FALSE){
        if($limit){
            $this->db->limit($limit);
        }

        return $this->db->select('c.*, p.nama')
                        ->from('courses c')
                        ->join('tutor p', 'c.pemateriid = p.id', 'LEFT')
                        ->where([
                            'c.status' => 1
                        ])->order_by('c.id', "DESC")->get();
    }

    function getActiveByLabels($labelid, $limit = false){
        if($limit){
            $this->db->limit($limit);
        }

        return $this->db->select('c.*, p.nama')
                        ->from('courses c')
                        ->join('tutor p', 'c.pemateriid = p.id', 'LEFT')
                        ->join('courses_label cl', 'c.id = cl.courseid')
                        ->where([
                            'c.status' => 1,
                            'cl.labelid' => $labelid
                        ])->order_by('c.id', "DESC")->get();
    }

    function getById($id){
        return $this->db->select('c.*, p.nama')
                        ->from('courses c')
                        ->join('tutor p', 'c.pemateriid = p.id', 'LEFT')
                        ->where([
                            'c.id' => $id
                        ])->order_by('c.id', "DESC")->get()->row();
    }

    function getByFlag($flag, $id = false){
        if($id){
            $this->db->where('c.id !=', $id);
        }

        return $this->db->select('c.*, p.nama')
                        ->from('courses c')
                        ->join('tutor p', 'c.pemateriid = p.id', 'LEFT')
                        ->where([
                            'c.flag' => $flag
                        ])->order_by('c.id', "DESC")->get()->row();
    }
}