<?php
class M_Courses extends CI_Model{
    function getAll(){
        return $this->db->select('c.*, p.nama')
                        ->from('courses c')
                        ->join('pemateri p', 'c.pemateriid = p.id', 'LEFT')
                        ->order_by('c.id', "DESC")->get();
    }

    function getActive(){
        return $this->db->select('c.*, p.nama')
                        ->from('courses c')
                        ->join('pemateri p', 'c.pemateriid = p.id', 'LEFT')
                        ->where([
                            'c.status' => 1
                        ])->order_by('c.id', "DESC")->get();
    }

    function getById($id){
        return $this->db->select('c.*, p.nama')
                        ->from('courses c')
                        ->join('pemateri p', 'c.pemateriid = p.id', 'LEFT')
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
                        ->join('pemateri p', 'c.pemateriid = p.id', 'LEFT')
                        ->where([
                            'c.flag' => $flag
                        ])->order_by('c.id', "DESC")->get()->row();
    }
}