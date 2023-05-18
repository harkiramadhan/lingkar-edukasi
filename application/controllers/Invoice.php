<?php
class Invoice extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model([
            'M_Enrollment',
            'M_Settings'
        ]);

        if($this->session->userdata('is_admin') != TRUE && $this->session->userdata('is_tutor') != TRUE && $this->session->userdata('is_user') != TRUE){
            redirect('');
        }

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

    function sertifikat(){
        ob_clean();
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
        $mpdf->showWatermarkImage = true;
        $mpdf->watermarkImgBehind = true;
        $mpdf->WriteHTML(
            '<watermarkimage src="https://www.freepnglogos.com/uploads/bingkai-sertifikat-png/bingkai-sertifikat-keren-png-11.png" alpha="1" size="297,210" position="0,0" />'
        );
        $invoice = $this->load->view('user/pdf/sertifikat',true, true);
        $mpdf->WriteHTML($invoice);
        $mpdf->Output("Sertifikat.pdf", "I");
        ob_end_flush();
    }
}