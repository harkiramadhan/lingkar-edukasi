<?php 
class Transaksi extends CI_Controller{
    function __construct(){
        parent::__construct();
        
        $this->load->model([
            'M_Transaksi',
            'M_Admin'
        ]);

        if($this->session->userdata('is_admin') != TRUE){
            redirect('admin','refresh');
        }
    }

    function index(){
        $userid = $this->session->userdata('userid');
        $var = [
            'user' => $this->M_Admin->getById($userid),
            'transaksi' => $this->M_Transaksi->getAll(),
            'ajax' => [
                'transaksi'
            ]
        ];

        $this->load->view('layout/admin/header', $var);
        $this->load->view('admin/transaksi', $var);
        $this->load->view('layout/admin/footer', $var);
    }

    function detail($orderid){
        $order = $this->M_Transaksi->getByOrderId($orderid);
        $data = json_decode($order->metadata);

        ?>
            <div class="modal-header">
				<h5 class="modal-title">Detail Transaksi</h5>
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
				</button>
			</div>

            <div class="modal-body">
                <table id="example2" class="table card-table display dataTable">
                    <tbody>
                        <tr>
                            <?php 
                                foreach($data as $key => $row){
                                    if($key != 'finish_redirect_url' && $key != 'transaction_id'){
                                        if($key == 'va_numbers'){
                                            foreach($row as $va){
                                                echo "<tr>
                                                            <td width='40%'>BANK</td>
                                                            <td>" . strtoupper($va->bank) . "</td>
                                                        </tr>";
                                                echo "<tr>
                                                            <td width='40%'>VIRTUAL NUMBER</td>
                                                            <td>" . $va->va_number . "</td>
                                                        </tr>";
                                            }
                                        }elseif($key == 'pdf_url'){
                                            echo "<tr>
                                                        <td colspan='2'><a href='" . $row . "' class='btn btn-sm btn-block btn-success' target='__BLANK'>Detail Payment</a></td>
                                                    </tr>";
                                        }elseif($key == 'transaction_status'){
                                            echo "<tr>
                                                        <td width='40%'>TRANSACTION STATUS</td>
                                                        <td><button type='button' class='btn btn-sm btn-block btn-success'>LUNAS</button></td>
                                                    </tr>";
                                        }elseif($key == 'payment_type' && $row == 'cstore'){
                                            echo "<tr>
                                                    <td width='40%'>PAYMENT TYPE</td>
                                                    <td>CSTORE (Indomaret / Alfamart)</td>
                                                </tr>";
                                        }else{
                                            echo "<tr>
                                                        <td width='40%'>" . strtoupper(str_replace('_', ' ', $key)) . "</td>
                                                        <td>" . strtoupper(str_replace('_', ' ', $row)) . "</td>
                                                    </tr>";
                                        }
                                    }
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php
    }
}   
