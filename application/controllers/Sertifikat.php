<?php 
class Sertifikat extends CI_Controller{

  function __construct(){
    parent::__construct();

    $this->load->model([
      'M_Settings',
      'M_Labels',
      'M_Courses',
      'M_Users',
      'M_Enrollment'
    ]);
  }

  function index(){
    $userid = $this->session->userdata('user_id');
    $var = [
      'labels' => $this->M_Labels->getActive(),
      'setting' => $this->M_Settings->get(),
      'user' => $this->M_Users->getById($userid),
    ];

    $this->load->view('layout/user/header', $var);
    $this->load->view('user/cek-sertifikat', $var);
    $this->load->view('layout/user/footer', $var);
  }

  function info($flag){
    // $userid = $this->session->userdata('user_id');
    // $course = $this->M_Courses->getByFlag($flag);

    // $dataInsert = [
    //   ''
    // ]
  }

  function download($flag){
    if(!$this->session->userdata('is_user'))
      redirect('','refresh');
      
    $userid = $this->session->userdata('user_id');
    $course = $this->M_Courses->getByFlag($flag);

    $trx = $this->M_Enrollment->getByUserCourse($userid, $course->id, 'settlement');
    $done = $this->db
                  ->select('u.name, s.*')
                  ->from('sertifikat s')
                  ->join('user u', 's.userid = u.id')
                  ->where([
                    'userid' => $userid, 
                    'courseid' => $course->id
                  ])->get();
    if($trx->num_rows() > 0 && $done->num_rows() > 0){
      $data = [
        'course' => $course,
        'detail' => $done->row()
      ];
      // $this->output->set_content_type('application/json')->set_output(json_encode($data));
      
      ob_clean();
      $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
      $mpdf->showWatermarkImage = true;
      $mpdf->watermarkImgBehind = true;
      $mpdf->WriteHTML(
          '<watermarkimage src="https://www.freepnglogos.com/uploads/bingkai-sertifikat-png/bingkai-sertifikat-keren-png-11.png" alpha="1" size="297,210" position="0,0" />'
      );
      $invoice = $this->load->view('user/pdf/sertifikat',$data, true);
      $mpdf->WriteHTML($invoice);
      $mpdf->Output("Sertifikat.pdf", "I");
      ob_end_flush();
    }else{
      redirect('');
    }
  }
}   