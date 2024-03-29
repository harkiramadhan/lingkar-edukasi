<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use \Midtrans\Snap;

\Midtrans\Config::$serverKey = 'SB-Mid-server-AF3TQXJegteEpwnV71LtYnNu';
\Midtrans\Config::$isProduction = false;
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

class Midtrans extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model([
            'M_Enrollment',
            'M_Settings'
        ]);
    }

    function checkoutProcess(){
        // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => 94000, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => 18000,
            'quantity' => 3,
            'name' => "Apple"
        );

        // Optional
        $item2_details = array(
            'id' => 'a2',
            'price' => 20000,
            'quantity' => 2,
            'name' => "Orange"
        );

        // Optional
        $item_details = array ($item1_details, $item2_details);

        // Optional
        $billing_address = array(
            'first_name'    => "Andri",
            'last_name'     => "Litani",
            'address'       => "Mangga 20",
            'city'          => "Jakarta",
            'postal_code'   => "16602",
            'phone'         => "081122334455",
            'country_code'  => 'IDN'
        );

        // Optional
        $shipping_address = array(
            'first_name'    => "Obet",
            'last_name'     => "Supriadi",
            'address'       => "Manggis 90",
            'city'          => "Jakarta",
            'postal_code'   => "16601",
            'phone'         => "08113366345",
            'country_code'  => 'IDN'
        );

        // Optional
        $customer_details = array(
            'first_name'    => "Andri",
            'last_name'     => "Litani",
            'email'         => "andri@litani.com",
            'phone'         => "081122334455",
            'billing_address'  => $billing_address,
            'shipping_address' => $shipping_address
        );

        // Optional, remove this to display all available payment methods
        // $enable_payments = array('credit_card','cimb_clicks','mandiri_clickpay','echannel');

        $enable_payments = [
            "bank_transfer",
            // "credit_card",
            "gopay",
            // "shopeepay",
            // "permata_va",
            // "bca_va",
            // "bni_va",
            // "bri_va",
            // "echannel",
            // "other_va",
            // "danamon_online",
            // "mandiri_clickpay",
            // "cimb_clicks",
            // "bca_klikbca",
            // "bca_klikpay",
            // "bri_epay",
            "Indomaret",
            "alfamart"
        ];

        $transaction = array(
            'enabled_payments' => $enable_payments,
            'transaction_details' => $transaction_details,
            // 'customer_details' => $customer_details,
            // 'item_details' => $item_details,
        );

        $snapToken = Snap::getSnapToken($transaction);
        echo "snapToken = ".$snapToken;
        
        ?>
        <!DOCTYPE html>
        <html>
            <body>
                <button id="pay-button">Pay!</button>
                <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre> 

                <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
                <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-sXV560B8LBgAVWJA"></script>
                <script type="text/javascript">
                    document.getElementById('pay-button').onclick = function(){
                        // SnapToken acquired from previous step
                        snap.pay('<?php echo $snapToken?>', {
                            // Optional
                            onSuccess: function(result){
                                /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                            },
                            // Optional
                            onPending: function(result){
                                /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                            },
                            // Optional
                            onError: function(result){
                                /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                            }
                        });
                    };
                </script>
            </body>
        </html>
        <?php
    }

    function notification(){
        $input = file_get_contents("php://input");
        $notification = json_decode($input);

        if($notification->transaction_status == 'expire'){
            $this->db->insert('midtrans_response', [
                'orderid' => $notification->order_id,
                'trx_status' => $notification->transaction_status,
                'data' => $input
            ]);
            $this->db->where('orderid', $notification->order_id)->delete('midtrans_snap');
        }elseif($notification->transaction_status == 'settlement'){
            $this->db->insert('midtrans_response', [
                'orderid' => $notification->order_id,
                'trx_status' => $notification->transaction_status,
                'data' => $input
            ]);
    
            $this->db->where('id', $notification->order_id)->update('orders', [
                'transaction_status' => $notification->transaction_status,
                'status_code' => $notification->status_code,
                'metadata_respose' => json_encode($notification)
            ]);
    
            $orderid = $notification->order_id;
            $order = $this->M_Enrollment->getByOrderId($orderid);
            $detail = $this->M_Enrollment->getOrderByOrderId($orderid);
            $data = [
                'orderid' => $orderid,
                'order' => $order,
                'detail' => $detail,
                'metadata' => json_decode($detail->metadata_respose),
                'setting' => $this->M_Settings->get(),
            ];

            $email = $detail->email;
            $mail = new PHPMailer(true);
    
            $mail->isSMTP();
            $mail->SMTPDebug    = 2;
            $mail->Host         = 'mail.lingkaredukasi.com';
            $mail->SMTPAuth     = true;
            $mail->Username     = 'norep@lingkaredukasi.com';
            $mail->Password     = 'Lingkar12345';
            $mail->SMTPSecure   = 'ssl';
            $mail->Port         = 465;
    
            $mail->setFrom('norep@lingkaredukasi.com', 'No Reply - Lingkar Edukasi');
            $mail->addReplyTo('admin@lingkaredukasi.com', 'Lingkar Edukasi');
            $mail->addAddress("$email");
            $mail->isHTML(true);
    
            $mail->Subject = 'Pembelian Berhasil - Course ' . $order->judul;
            $mailContent = $this->load->view('user/email/email-beli-kelas', $data , TRUE);
    
            $mail->Body = $mailContent;
    
            $mail->send();
        }
    }

    function sendMail($orderid){
        $order = $this->M_Enrollment->getByOrderId($orderid);
        $detail = $this->M_Enrollment->getOrderByOrderId($orderid);
        $data = [
            'orderid' => $orderid,
            'order' => $order,
            'detail' => $detail,
            'metadata' => json_decode($detail->metadata_respose),
            'setting' => $this->M_Settings->get(),
        ];
        
        $email = $detail->email;
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->SMTPDebug    = 2;
        $mail->Host         = 'mail.lingkaredukasi.com';
        $mail->SMTPAuth     = true;
        $mail->Username     = 'norep@lingkaredukasi.com';
        $mail->Password     = 'Lingkar12345';
        $mail->SMTPSecure   = 'ssl';
        $mail->Port         = 465;

        $mail->setFrom('norep@lingkaredukasi.com', 'No Reply - Lingkar Edukasi');
        $mail->addReplyTo('admin@lingkaredukasi.com', 'Lingkar Edukasi');
        $mail->addAddress("$email");
        $mail->isHTML(true);

        $mail->Subject = 'Pembelian Berhasil - Course ' . $order->judul;
        $mailContent = $this->load->view('user/email/email-beli-kelas', $data , TRUE);

        $mail->Body = $mailContent;

        if(!$mail->send()){
            return FALSE;
        }else{
            return TRUE;
        }
    }
}