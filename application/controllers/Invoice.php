<?php
class Invoice extends CI_Controller{
    function __construct(){
        parent::__construct();

    }

    function index(){
        
        ob_clean();
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $invoice = $this->load->view('user/pdf/invoice', true, true);
        $mpdf->WriteHTML($invoice);
        $mpdf->Output("invoice.pdf", "I");

        ob_end_flush();
    }
}