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
      'user' => $this->M_Users->getById($userid)
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

    $setting = $this->M_Settings->get();
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
        'detail' => $done->row(),
        'setting' => $setting,
      ];
      // $this->output->set_content_type('application/json')->set_output(json_encode($data));
      
      ob_clean();
      $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
      $mpdf->showWatermarkImage = true;
      $mpdf->watermarkImgBehind = true;
      $bg = ($setting->bg_sertifikat) ? base_url('uploads/settings/' . $setting->bg_sertifikat) : 'https://www.freepnglogos.com/uploads/bingkai-sertifikat-png/bingkai-sertifikat-keren-png-11.png';
      $mpdf->WriteHTML(
          '<watermarkimage src="' . $bg . '" alpha="1" size="297,210" position="0,0" />'
      );
      $invoice = $this->load->view('user/pdf/sertifikat',$data, true);
      $mpdf->WriteHTML($invoice);
      $mpdf->Output("Sertifikat.pdf", "I");
      ob_end_flush();
    }else{
      redirect('');
    }
  }

  function getData(){
    $value = ltrim(preg_replace("/[^0-9]/", "", $this->input->get('searchValue')), '0');
    $get = $this->db->select('s.id, c.judul, u.name, s.timestamp')
                    ->from('sertifikat s')
                    ->join('user u', 's.userid = u.id')
                    ->join('courses c', 's.courseid = c.id')
                    ->where([
                      's.id' => $value
                    ])->get();
    ?>
      <?php if($get->num_rows() > 0): $data = $get->row(); ?>
        <div class="success-message w-form-done" style="display: block !important">
          <div class="success-sertifikat"><img src="<?= base_url('assets/user/images/Check-circle_1.svg')?>" loading="lazy" alt="">
            <h1 class="semibolld success-green">Sertifikatmu Valid</h1>
            <div class="card-cek_sertifikat">
              <div class="cek-sertif_content">
                <h6 class="heading-xs_thin">Nomor Sertifikat</h6>
                <div class="heading-card_sertif">#LE<?= str_pad($data->id, 8, '0', STR_PAD_LEFT) ?></div>
              </div>
              <div class="cek-sertif_content">
                <h6 class="heading-xs_thin">Kelas</h6>
                <div class="heading-card_sertif"><?= $data->judul ?></div>
              </div>
              <div class="cek-sertif_content">
                <h6 class="heading-xs_thin">Nama</h6>
                <div class="heading-card_sertif"><?= $data->name ?></div>
              </div>
              <div class="cek-sertif_content">
                <h6 class="heading-xs_thin">Diperoleh</h6>
                <div class="heading-card_sertif"><?= $data->timestamp ?></div>
              </div>
            </div>
            <a href="<?= site_url('sertifikat') ?>" class="button is-yellow w-button">CARI SERTIFIKAT LAIN</a>
              <p class="blind-text width-40">Butuh bantuan? Mohon hubungi Lingkar Edukasi <a href="#" class="link-span-blind">Hubungi Kami</a>
            </p>
          </div>
        </div>
      <?php else: ?>
        <div class="error-message w-form-fail" style="border-radius: 16px; display: block !important">
          <div class="success-sertifikat">
            <img src="<?= base_url('assets/user/images/Dangerous.svg')?>" loading="lazy" alt="">
            <h1 class="semibolld error-red">Sertifikatmu Tidak Valid</h1>
            <a href="<?= site_url('sertifikat') ?>" class="button is-yellow w-button">CARI SERTIFIKAT LAIN</a>
              <p class="blind-text width-40">Butuh bantuan? Mohon hubungi Lingkar Edukasi <br> <a href="#" class="link-span-blind">Hubungi Kami</a>
            </p>
          </div>
        </div> 
      <?php endif; ?>
    <?php
  }
}   