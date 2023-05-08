<?php 
class Course extends CI_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model([
      'M_Users',
      'M_Courses',
      'M_Settings',
      'M_Labels',
      'M_Benefit_Landing',
      'M_Testimoni_Landing',
      'M_Banners',
      'M_Partner',
      'M_Benefit',
      'M_Tutor',
      'M_Materi'
    ]);

    // if(!$this->session->userdata('is_user')){
    //   redirect('','refresh');
    // }
  }

  function index($categoryid=false){
    $userid = $this->session->userdata('user_id');
    $var = [
      'labels' => $this->M_Labels->getActive(),
      'setting' => $this->M_Settings->get(),
      'user' => $this->M_Users->getById($userid),
    ];
    $this->load->view('layout/user/header', $var);
    $this->load->view('user/course-list', $var);
    $this->load->view('layout/user/footer', $var);
  }

  function detail($flag){
    $userid = $this->session->userdata('user_id');
    $course = $this->M_Courses->getByFlag($flag);
    $var = [
      'labels' => $this->M_Labels->getActive(),
      'setting' => $this->M_Settings->get(),
      'user' => $this->M_Users->getById($userid),
      'course' => $course,
      'title' => $this->M_Courses->getByFlag($flag)->judul,
      'benefit' => $this->M_Benefit->getByCourse($course->id),
      'tutor' => $this->M_Tutor->getById($course->pemateriid),
      'materi' => $this->M_Materi->getByClass($course->id)
    ];

    $this->load->view('layout/user/header', $var);
    $this->load->view('user/course-detail', $var);
    $this->load->view('layout/user/footer', $var);
  }

  function search(){
    $val = $this->input->get('val', TRUE);
    $getData = $this->db->select("lower(concat_ws(' ', judul, nama)) as hasil")
                        ->select("c.judul, c.cover, t.nama, c.price, c.discount")
                        ->from('courses c')
                        ->join('tutor t', 'c.pemateriid = t.id')
                        ->where([
                          'c.status' => 1
                        ])
                        ->having("hasil LIKE '%" . str_replace(" ", '%', strtolower($val)) . "%' ")
                        ->limit(10)->get();

    
    if($getData->num_rows() > 0){
      foreach($getData->result() as $row){
        ?>
          <div class="kelas-card-vertical_wrapper">
            <div class="kelas-card-vertical_image-wrapper">
              <img src="<?= site_url('uploads/courses/' . $row->cover) ?>" loading="lazy" sizes="100vw" srcset="<?= base_url('uploads/courses/' . $row->cover) ?> 500w, <?= base_url('uploads/courses/' . $row->cover) ?> 576w" alt="" class="kelas-card-vertical_image">
            </div>
            <div class="kelas-card-vertical_content">
              <div class="kelas-card_title-wrapper">
                <h3 class="heading-xtrasmall no-margin searchresult"><?= $row->judul ?></h3>
                <div class="kelas-card_creator hide-mobile">By <?= $row->nama ?></div>
              </div>
              <div class="kelas-card-vertical_harga"><?= discount($row->price, $row->discount) ?></div>
            </div>
          </div>
        <?php
      }

      ?>
        <div class="divider" style="margin-top: 30px"></div>
        <div class="search-link">
          <div class="text-size-medium is-red btn-redirect" data-url="<?= site_url('course') ?>" style="margin-top: 15px; cursor: pointer">Lihat semua kelas</div>
        </div>

        <script>
          $('.btn-redirect').click(function(){
              var url = $(this).attr('data-url')
              window.location.href = url
          })
        </script>
      <?php
    }else{
      ?>
        <div class="empt-result_image"><img src="images/Dangerous.svg" loading="lazy" alt=""></div>
        <div>
          <h3 class="heading-xtrasmall no-margin">Maaf, kami tidak menemukan untuk &quot;<?= $val ?>&quot;</h3>
          <div class="kelas-card_creator">Gunakan istilah pencarian lainnya</div>
        </div>
        <h3 class="heading-xtrasmall no-margin">atau</h3>
        <div class="divider" style="margin-top: 30px"></div>
        <div class="search-link">
          <div class="text-size-medium is-red btn-redirect" data-url="<?= site_url('course') ?>" style="margin-top: 15px; cursor: pointer">Lihat semua kelas</div>
        </div>

        <script>
          $('.btn-redirect').click(function(){
              var url = $(this).attr('data-url')
              window.location.href = url
          })
        </script>
      <?php
    }
    
  }
}   