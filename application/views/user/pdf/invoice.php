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
            <td>11111</td>
        </tr>
        <tr>
            <td width="200">Nama Pengguna</td>
            <td width="10">:</td>
            <td>Alfian Rahmatullah</td>
        </tr>
        <tr>
            <td width="200">Tanggal Pembelian</td>
            <td width="10">:</td>
            <td>12 Desember 2021</td>
        </tr>
    </table>
    
    <table width="100%" style="margin-top: 20px;">
        <tr>
            <td colspan="3" style="color: black; border-bottom: 1px dotted grey; padding-bottom: 5px;"><strong>Pembayaran Berhasil</strong></td>
        </tr>
        <tr>
            <td width="200">Tanggal Pembayaran</td>
            <td width="10">:</td>
            <td>Kamis, 12 Maret 2023 12.00 WIB</td>
        </tr>
        <tr>
            <td width="200">Metode Pembayaran</td>
            <td width="10">:</td>
            <td>Transfer BCA</td>
        </tr>
    </table>
    <table width="100%" style="margin-top: 20px;">
        <tr>
            <td colspan="2" style="color: black; border-bottom: 1px dotted grey; padding-bottom: 5px;"><strong>Detail Pembelian</strong></td>
        </tr>
        <tr>
            <td width="400" style="border-bottom: 1px dotted grey; padding-bottom: 5px;">
                <p style="padding-bottom: 0px;">Mengasah Kreativitas dengan Seni Origami</p>
            </td>
            <td valign="top" align="right" style="border-bottom: 1px dotted grey; padding-bottom: 5px;">Rp. 20.000,.</td>
        </tr>
        <tr>
            <td width="400" style="padding-top: 5px;">
                <strong>Subtotal</strong>
            </td>
            <td align="right" style="padding-top: 10px;"><strong>Rp. 40.000,.</strong></td>
        </tr>
    </table>
    
    
    <table width="100%" style="margin-top: 20px; border-collapse: collapse;">
        <tr>
            <td width="400" style="border-bottom: 1px dotted grey; padding: 5px 5px;">
                Total Harga
            </td>
            <td align="right" style="border-bottom: 1px dotted grey; padding: 5px 0px;">Rp. 12.000</td>
        </tr>
        <tr>
            <td width="400" style="border-bottom: 1px dotted grey; padding: 5px 5px;">
                Administrasi
            </td>
            <td align="right" style="border-bottom: 1px dotted grey; padding: 5px 0px;">Rp. 2.000</td>
        </tr>
        <tr>
            <td width="400" style="border-bottom: 1px dotted grey; padding: 5px 5px;">
                <strong>Total Pembayaran</strong>
            </td>
            <td align="right" style="border-bottom: 1px dotted grey; padding: 5px 0px;">Rp. 14.000</td>
        </tr>
        <tr>
            <td width="400" style="border-bottom: 1px dotted grey; padding: 5px 5px;">
                Status
            </td>
            <td align="right" style="border-bottom: 1px dotted grey; padding: 5px 0px;">Lunas</td>
        </tr>
    </table>

    <table width="100%" style="margin-top: 20px;">
        <tr>
            <td>            
                Delta Purna Widyangga
                <br>
                CEO
            </td>
        </tr>
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
                <strong>PT Qiscus Tekno Indonesia</strong>
                <br>
                Plaza Kuningan South Tower 11th
                Floor, Jl. H. R. Rasuna Said, Karet
                Kuningan, Jakarta Selatan, 12920
                NPWP: 81.181.047.2-067.000
            </td>
            <td width="40%" style="border-top: 1px solid black; padding: 20px 0px;">            
                Phone : +62 274 515 428
                <br>
                Email : contact@qiscus.com
                <br>
                Web : www.qiscus.com
            </td>
        </tr>
    </table>
</body>
</html>