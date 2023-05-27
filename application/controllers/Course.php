<?php 

use \Midtrans\Snap;
use \Midtrans\Transaction;

\Midtrans\Config::$serverKey = 'SB-Mid-server-AF3TQXJegteEpwnV71LtYnNu';
\Midtrans\Config::$isProduction = false;
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

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
      'M_Materi',
      'M_Video',
      'M_Enrollment'
    ]);
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

    if($userid){
      $settlementTrx = $this->M_Enrollment->getByUserCourse($userid, $course->id, 'settlement');
      $savedSnapToken = $this->db->get_where('midtrans_snap', ['userid' => $userid, 'courseid' => $course->id])->row();
      $orderid = rand();
      $idorder = (@$savedSnapToken->orderid) ? @$savedSnapToken->orderid : $orderid;
      $transaction_details = [
          'order_id' => $idorder,
          'gross_amount' => price($course->price, $course->discount)
      ];

      $customer_details = [
          'first_name'    => $var['user']->name,
          'last_name'     => "",
          'email'         => $var['user']->email,
          'phone'         => $var['user']->nohp,
      ];

      $item_details = [[
          'id' => $course->id,
          'price' => price($course->price, $course->discount),
          'quantity' => 1,
          'name' => $course->judul
      ]];

      $transaction = [
          'transaction_details' => $transaction_details,
          'customer_details' => $customer_details,
          'item_details' => $item_details,
          'callbacks' => [
              'finish' => site_url('course/finishPayment?order_id=' . $idorder . '_' . $userid . '_' . $course->id)
          ]
      ];

      $var['status'] = $settlementTrx;
      $var['snapToken'] = (@$savedSnapToken->snapToken) ? @$savedSnapToken->snapToken : Snap::getSnapToken($transaction);
      $var['orderid'] = $idorder;
    }

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
        <div class="empt-result_image">
          <img src="<?= base_url('assets/user/images/Dangerous.svg') ?>" loading="lazy" alt="">
        </div>
        <div>
          <h3 class="kelas-card_creator">Maaf, kami tidak menemukan untuk &quot;<?= $val ?>&quot;</h3>
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

  /* Midtrans Here! */
  function saveTransaction(){
    if($this->session->userdata('is_user') != TRUE)
        redirect('','refresh');

    $datas = $this->input->post('params', TRUE);
    $userid = $this->session->userdata('user_id');
    $courseid = $this->input->post('courseid', TRUE);
    $course = $this->M_Courses->getById($courseid);
    if($datas['order_id']){
      if($datas['transaction_status'] == 'settlement'){
        /* Simpan Log Transaksi Midtrans */
        $this->db->insert('midtrans_response', [
          'orderid' => $datas['order_id'],
          'trx_status' => $datas['transaction_status'],
          'data' => json_encode($datas)
        ]);

        /* Simpan Detail Log Order Dari Midtrans */
        $this->db->insert('orders', [
          'id' => $datas['order_id'],
          'status_code' => $datas['status_code'],
          'transaction_status' => $datas['transaction_status'],
          'gross_amount' => $datas['gross_amount'],
          'userid' => $userid,
          'metadata' => json_encode($datas),
          'metadata_respose' => json_encode($datas) 
        ]);

        if($this->db->affected_rows() > 0){
          /* Insert To Enrollment Before */
          $this->db->insert('enrollment', [
            'orderid' => $datas['order_id'],
            'courseid' => $courseid,
            'userid' => $userid,
            'pay' => $datas['gross_amount']
          ]);

          if($this->db->affected_rows() > 0){
            $res = [
              'status' => 200,
              'url' => site_url('kelas/' . $course->flag . '/joined')
            ];
          }else{
            $res = [
              'status' => 400,
              'url' => site_url('course/' . $course->flag . '/detail')
            ];  
          }
        }else{
          $res = [
            'status' => 400,
            'url' => site_url('course/' . $course->flag . '/detail')
          ];
        }
      }else{
        $res = [
          'status' => 400,
          'url' => site_url('course/' . $course->flag . '/detail')
        ];
      }
    }else{
      $res = [
        'status' => 400,
        'url' => site_url('course/' . $course->flag . '/detail')
      ];
    }

    $this->output->set_content_type('application/json')->set_output(json_encode($res));
  }

  function saveSnapTransaction(){
    $userid = $this->session->userdata('user_id');
    $courseid = $this->input->post('courseid', TRUE); 
    $snapToken = $this->input->post('snapToken', TRUE); 
    $orderid = $this->input->post('orderid', TRUE);

    $cek = $this->db->get_where('midtrans_snap', ['userid' => $userid, 'courseid' => $courseid, 'snapToken' => $snapToken]);
    if($cek->num_rows() > 0){}else{
      $this->db->insert('midtrans_snap', [
        'userid' => $userid,
        'courseid' => $courseid,
        'orderid' => $orderid,
        'snapToken' => $snapToken
      ]);
    }
  }

  function saveTransaction2(){
    if($this->session->userdata('is_user') != TRUE)
        redirect('','refresh');

    $datas = $this->input->post('params', TRUE);
    $userid = $this->session->userdata('user_id');
    $courseid = $this->input->post('courseid', TRUE);
    $course = $this->M_Courses->getById($courseid);
    if($datas['order_id']){
        /* Simpan Log Transaksi Midtrans */
        $this->db->insert('midtrans_response', [
          'orderid' => $datas['order_id'],
          'data' => json_encode($datas)
        ]);

        /* Simpan Detail Log Order Dari Midtrans */
        $this->db->insert('orders', [
          'id' => $datas['order_id'],
          'status_code' => $datas['status_code'],
          'transaction_status' => $datas['transaction_status'],
          'gross_amount' => $datas['gross_amount'],
          'userid' => $userid,
          'metadata' => json_encode($datas),
          'metadata_respose' => json_encode($datas) 
        ]);

        if($this->db->affected_rows() > 0){
          /* Insert To Enrollment Before */
          $this->db->insert('enrollment', [
            'orderid' => $datas['order_id'],
            'courseid' => $courseid,
            'userid' => $userid,
            'pay' => $datas['gross_amount']
          ]);

          if($this->db->affected_rows() > 0){
            $res = ['status' => 200];
          }else{
            $res = ['status' => 400 ];  
          }
        }else{
          $res = ['status' => 400 ];
        }
    }else{
      $res = ['status' => 400 ];
    }

    $this->output->set_content_type('application/json')->set_output(json_encode($res));
  }

  function finishPayment(){
    $dataUrl = $this->input->get('order_id', TRUE);
    $data = explode('_', $dataUrl);
    $trxStatus = Transaction::status($data[0]);
    $course = $this->M_Courses->getById($data[2]);
    $this->db->insert('orders', [
      'id' => $data[0],
      'status_code' => $trxStatus->status_code,
      'transaction_status' => $trxStatus->transaction_status,
      'gross_amount' => $trxStatus->gross_amount,
      'userid' => $data[1],
      'metadata' => json_encode($trxStatus),
      'metadata_respose' => json_encode($trxStatus) 
    ]);
    if($this->db->affected_rows() > 0){
      $this->db->insert('enrollment', [
        'orderid' => $data[0],
        'courseid' => $data[2],
        'userid' => $data[1],
        'pay' => $trxStatus->gross_amount
      ]);
      
      redirect('kelas/' . $course->flag . '/joined' ,'refresh');
    }
  }
}   