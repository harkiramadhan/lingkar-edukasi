<?php
class M_Transaksi extends CI_Model{
    function getById($id){

    }

    function getAll($courseid = FALSE){
        if($courseid){
            $this->db->where('c.id', $courseid);
        }
        
        return $this->db->select('u.name, e.orderid, e.pay, o.metadata, c.judul')
                        ->from('enrollment e')
                        ->join('orders o', 'e.orderid = o.id')
                        ->join('user u', 'e.userid = u.id')
                        ->join('courses c', 'e.courseid = c.id')
                        ->where([
                            'o.transaction_status' => 'settlement'
                        ])->order_by('o.timestamp', 'DESC')->get();
    }

    function getByOrderId($orderid){
        return $this->db->select('u.name, e.orderid, e.pay, o.metadata, c.judul')
                        ->from('enrollment e')
                        ->join('orders o', 'e.orderid = o.id')
                        ->join('user u', 'e.userid = u.id')
                        ->join('courses c', 'e.courseid = c.id')
                        ->where([
                            'o.id' => $orderid
                        ])->get()->row();
    }

    function getSumByCourse($courseid){
        return $this->db->select('o.*')
                        ->from('orders o')
                        ->join('enrollment e', 'e.orderid = o.id')
                        ->join('courses c', 'e.courseid = c.id')
                        ->where([
                            'c.id' => $courseid,
                            'o.transaction_status' => 'settlement'
                        ])->get();
    }

    function getByCourse($courseid){
        return $this->db->select('SUM(gross_amount) AS total')
                        ->from('orders o')
                        ->join('enrollment e', 'e.orderid = o.id')
                        ->join('courses c', 'e.courseid = c.id')
                        ->where([
                            'c.id' => $courseid,
                            'o.transaction_status' => 'settlement'
                        ])->get()->row();
    }

    function getByDate($date, $tutorid = FALSE){
        if(@$tutorid){
            $this->db->where('c.pemateriid', $tutorid);
        }
        return $this->db->select('SUM(gross_amount) AS total')
                        ->from('orders o')
                        ->join('enrollment e', 'e.orderid = o.id')
                        ->join('courses c', 'e.courseid = c.id')
                        ->where([
                            'DATE(o.timestamp)' => $date,
                            'o.transaction_status' => 'settlement'
                        ])->get()->row();
    }

    function getByWeek($week, $tutorid = FALSE){
        if(@$tutorid){
            $this->db->where('c.pemateriid', $tutorid);
        }
        return $this->db->select('SUM(gross_amount) AS total')
                        ->from('orders o')
                        ->join('enrollment e', 'e.orderid = o.id')
                        ->join('courses c', 'e.courseid = c.id')
                        ->where([
                            'WEEK(o.timestamp)' => $week,
                            'YEAR(o.timestamp)' => date('Y'),
                            'o.transaction_status' => 'settlement'
                        ])->get()->row();
    }

    function getByMonth($month, $tutorid = FALSE){
        if(@$tutorid){
            $this->db->where('c.pemateriid', $tutorid);
        }
        return $this->db->select('SUM(gross_amount) AS total')
                        ->from('orders o')
                        ->join('enrollment e', 'e.orderid = o.id')
                        ->join('courses c', 'e.courseid = c.id')
                        ->where([
                            'MONTH(o.timestamp)' => $month,
                            'YEAR(o.timestamp)' => date('Y'),
                            'o.transaction_status' => 'settlement'
                        ])->get()->row();
    }
}