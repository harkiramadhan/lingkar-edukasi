<?php
class M_Transaksi extends CI_Model{
    function getById($id){

    }

    function getAll(){
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
}