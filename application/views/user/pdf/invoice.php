<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pembayaran</title>
    <style>
        *, td {
            font-family: Arial, Helvetica, sans-serif !important;
        }
    </style>
</head>
<body>
    <img src="<?= base_url('assets/admin/images/brand/logo-only-main.svg') ?>" alt="Logo Invoice" style="width: auto; height: 30px;">
    <img src="<?= base_url('assets/admin/images/brand/logo-text-main.svg') ?>" alt="Logo Invoice" style="width: auto; height: 12px; padding-bottom: 10px; margin-left: 10px;">
    
    <table width="100%" style="margin-top: 30px;">
        <tr>
            <td colspan="3" style="color: black; border-bottom: 1px dotted grey; padding-bottom: 5px;"><strong>Detail Pembeli</strong></td>
        </tr>
        <tr>
            <td width="200">No Tagihan</td>
            <td width="10">:</td>
            <td><?= $order->orderid . "/INV/" . date('Ymd', strtotime($order->payment_timestamp)) ?></td>
        </tr>
        <tr>
            <td width="200">Nama Pengguna</td>
            <td width="10">:</td>
            <td><?= $order->name ?></td>
        </tr>
        <tr>
            <td width="200">Tanggal Pembelian</td>
            <td width="10">:</td>
            <td><?= mediumdate_indo(date('Y-m-d', strtotime($order->payment_timestamp))) ?></td>
        </tr>
    </table>
    
    <table width="100%" style="margin-top: 20px;">
        <tr>
            <td colspan="3" style="color: black; border-bottom: 1px dotted grey; padding-bottom: 5px;"><strong>Pembayaran Berhasil</strong></td>
        </tr>
        <tr>
            <td width="200">Tanggal Pembayaran</td>
            <td width="10">:</td>
            <td>
                <?php 
                    if($metadata->payment_type == 'qris' || $metadata->payment_type == 'cstore'): 
                        $tanggalPembayaran = longdate_indo(date('Y-m-d', strtotime($metadata->transaction_time))).", ".date('H:i:s', strtotime($metadata->transaction_time))." WIB";
                    else: 
                        if(@$metadata->settlement_time):
                            $tanggalPembayaran =  longdate_indo(date('Y-m-d', strtotime($metadata->settlement_time))).", ".date('H:i:s', strtotime($metadata->settlement_time))." WIB";
                        elseif($metadata->transaction_time):
                            $tanggalPembayaran = longdate_indo(date('Y-m-d', strtotime($metadata->transaction_time))).", ".date('H:i:s', strtotime($metadata->transaction_time))." WIB";
                        endif;
                    endif;
                    echo @$tanggalPembayaran;
                ?>
            </td>
        </tr>
        <tr>
            <td width="200">Metode Pembayaran</td>
            <td width="10">:</td>
            <td>
                <?php if($metadata->payment_type == 'bank_transfer'):
                    if(@$metadata->permata_va_number){
                        echo "Permata Virtual Account";
                    }else{
                        foreach(@$metadata->va_numbers as $va){
                            echo strtoupper($va->bank) . " Virtual Account";
                        }    
                    }
                ?>
                <?php elseif($metadata->payment_type == 'echannel'): ?>
                        Mandiri Virtual Account
                <?php elseif($metadata->payment_type == 'cstore'): ?>
                        <?php if($status->store == 'alfamart'): ?>
                            Alfamart
                        <?php else: ?>
                            Indomaret
                        <?php endif; ?>
                <?php elseif($metadata->payment_type == 'gopay'): ?>
                        Gopay
                <?php endif; ?>
            </td>
        </tr>
    </table>
    <table width="100%" style="margin-top: 20px;">
        <tr>
            <td colspan="2" style="color: black; border-bottom: 1px dotted grey; padding-bottom: 5px;"><strong>Detail Pembelian</strong></td>
        </tr>
        <tr>
            <td width="400" style="border-bottom: 1px dotted grey; padding-bottom: 5px;">
                <p style="padding-bottom: 0px;">Kelas <?= $order->judul ?></p>
            </td>
            <td valign="top" align="right" style="border-bottom: 1px dotted grey; padding-bottom: 5px;">Rp. <?= rupiah($metadata->gross_amount) ?>,.</td>
        </tr>
        <tr>
            <td width="400" style="padding-top: 5px;">
                <strong>Subtotal</strong>
            </td>
            <td align="right" style="padding-top: 10px;"><strong>Rp. <?= rupiah($metadata->gross_amount) ?>,.</strong></td>
        </tr>
    </table>
    
    
    <table width="100%" style="margin-top: 20px; border-collapse: collapse;">
        <tr>
            <td width="400" style="border-bottom: 1px dotted grey; padding: 5px 5px;">
                Total Harga
            </td>
            <td align="right" style="border-bottom: 1px dotted grey; padding: 5px 0px;">Rp. <?= rupiah($metadata->gross_amount) ?>,.</td>
        </tr>
        <!-- <tr>
            <td width="400" style="border-bottom: 1px dotted grey; padding: 5px 5px;">
                Administrasi
            </td>
            <td align="right" style="border-bottom: 1px dotted grey; padding: 5px 0px;">Rp. 2.000</td>
        </tr> -->
        <tr>
            <td width="400" style="border-bottom: 1px dotted grey; padding: 5px 5px;">
                <strong>Total Pembayaran</strong>
            </td>
            <td align="right" style="border-bottom: 1px dotted grey; padding: 5px 0px;">Rp. <?= rupiah($metadata->gross_amount) ?>,.</td>
        </tr>
        <tr>
            <td width="400" style="border-bottom: 1px dotted grey; padding: 5px 5px;">
                Status
            </td>
            <td align="right" style="border-bottom: 1px dotted grey; padding: 5px 0px;">Lunas</td>
        </tr>
    </table>

    <table width="100%" style="margin-top: 20px;">
        <!-- <tr>
            <td>            
                Delta Purna Widyangga
                <br>
                CEO
            </td>
        </tr> -->
        <tr>
            <td>            
                <br><br>    
            </td>
            <td align="right">            
                <!-- <img src="https://i.ibb.co/w47khv7/Group-3.png" alt="TTD Bendahara" style="width: auto; height: 60px;"> -->
            </td>
        </tr>
        <tr>
            <td>            
                <i>digital copy no signature required</i>
            </td>
        </tr>
    </table>

    <table width="100%" style="margin-top: 20px;">
        <tr>
            <td width="60%" style="border-top: 1px solid black; padding: 20px 0px;">            
                <strong>Lingkar Edukasi</strong>
                <br>
                <?= $setting->alamat_judul ?> <br>
                <?= $setting->alamat_1 ?> <br>
                <?= $setting->alamat_2 ?>
            </td>
            <td width="40%" style="border-top: 1px solid black; padding: 20px 0px;">            
                Phone : <?= $setting->telefon ?>
                <br>
                Fax : <?= $setting->fax ?>
                <br>
                Email : <?= $setting->email ?>
                <br>
                Web : www.lingkaredukasi.com
            </td>
        </tr>
    </table>
</body>
</html>