<?php
class Invoice extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model([
            'M_Enrollment',
            'M_Settings'
        ]);

    }

    function index($orderid){
        $detail = $this->M_Enrollment->getOrderByOrderId($orderid);
        $var = [
            'order' => $this->M_Enrollment->getByOrderId($orderid),
            'detail' => $detail,
            'metadata' => json_decode($detail->metadata_respose),
            'setting' => $this->M_Settings->get(),
        ];
        
        ob_clean();
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $invoice = $this->load->view('user/pdf/invoice', $var, true);
        $mpdf->WriteHTML($invoice);
        $mpdf->Output("invoice.pdf", "I");
        ob_end_flush();
    }
}