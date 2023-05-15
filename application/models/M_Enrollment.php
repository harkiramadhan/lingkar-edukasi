<?php
class M_Enrollment extends CI_Model{
    function getByUserCourse($userid, $courseid, $status = FALSE){
        if($status){
            $this->db->where([
                'o.transaction_status' => $status
            ]);
        }

        return $this->db->select('o.* ')
                        ->from('enrollment e')
                        ->join('orders o', 'e.orderid = o.id')
                        ->where([
                            'e.userid' => $userid,
                            'e.courseid' => $courseid
                        ])->get();
    }

    function getSettlementUser($userid){
        return $this->db->select('c.*, p.nama')
                        ->from('enrollment e')
                        ->join('orders o', 'e.orderid = o.id')
                        ->join('courses c', 'e.courseid = c.id')
                        ->join('tutor p', 'c.pemateriid = p.id', 'LEFT')
                        ->where([
                            'e.userid' => $userid,
                            'o.transaction_status' => 'settlement'
                        ])->get();
    }
}