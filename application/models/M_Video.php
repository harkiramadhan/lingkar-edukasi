<?php
class M_Video extends CI_Model{
    function getById($id){
        return $this->db->get_where('video', ['id' => $id])->row();
    }

    function getByClass($id){
        return $this->db->get_where('video', ['courseid' => $id]);
    }

    function sumDurationByClass($id){
        return $this->db->select('SEC_TO_TIME( SUM(time_to_sec(`durasi`))) AS total, COUNT(`id`) AS jumlah')
                        ->get_where('video', ['courseid' => $id])->row();
    }

    function getByMateri($materiid){
        return $this->db->get_where('video', ['materiid' => $materiid]);
    }

    function getByIdHash($hash){
        return $this->db->get_where('video', ["md5(id)" => $hash])->row();
    }
}