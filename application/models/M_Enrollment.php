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
        return $this->db->select('c.*, p.nama, e.orderid')
                        ->from('enrollment e')
                        ->join('orders o', 'e.orderid = o.id')
                        ->join('courses c', 'e.courseid = c.id')
                        ->join('tutor p', 'c.pemateriid = p.id', 'LEFT')
                        ->where([
                            'e.userid' => $userid,
                            'o.transaction_status' => 'settlement'
                        ])->get();
    }

    function getByOrderId($orderid){
        return $this->db->select('c.*, p.nama nama_pemateri, e.orderid, u.name, o.timestamp payment_timestamp')
                        ->from('enrollment e')
                        ->join('orders o', 'e.orderid = o.id')
                        ->join('courses c', 'e.courseid = c.id')
                        ->join('tutor p', 'c.pemateriid = p.id', 'LEFT')
                        ->join('user u', 'e.userid = u.id')
                        ->where([
                            'o.id' => $orderid,
                            'o.transaction_status' => 'settlement'
                        ])->get()->row();
    }

    function getOrderByOrderId($orderid){
        return $this->db->select('o.*')
                        ->from('orders o')
                        ->where([
                            'o.id' => $orderid
                        ])->get()->row();
    }
}