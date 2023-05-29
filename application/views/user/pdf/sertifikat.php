<html>

    <title>Sertifikat</title>
    <head>
        <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;800;900&display=swap" rel="stylesheet"> -->
        <style>

            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;800;900&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap');

            *,body{
                font-family: Arial, Helvetica, sans-serif;
                margin: 0px;
                padding: 0px;
            }
        </style>
    </head>

</html>
<body>
    <!-- <table width="100%">
        <tr>
            <td style="text-align: center" >
                <img src="<?= base_url('assets/images/guest/logo-primary.svg') ?>" alt="" style="height:40px; width: auto; ">
            </td>
        </tr>
    </table> -->

    <table width="100%" style="padding-top: 90px;">
        <tr>
            <td align="center">
                <h1 style="font-family: 'Dancing Script', cursive !important;">CERTIFICATE OF COMPLETION</h1>
            </td>
        </tr>
        <tr>
            <td align="center" style="font-size:18px;">NO: LE<?= str_pad($detail->id, 8, '0', STR_PAD_LEFT) ?></td>
        </tr>
    </table>
    <table width="100%" style="margin-top: 20px;">
        <tr>
            <td align="center" style="font-size:18px;">THIS CERTIFICATE IS PROUDLY PRESENTED TO</td>
        </tr>
        <tr>
            <td align="center" style="font-size:18px;">
                <h3><?= $detail->name ?></h3>
            </td>
        </tr>
    </table>

    <table width="100%" style="margin-top:20px;">
        <tr>
            <td align="center" style="font-size:18px;">FOR SUCCESSFULLY COMPLETING ALL CONTENTS ON ONLINE COURSE:</td>
        </tr>
        <tr>
            <td align="center" style="font-size:18px;">
                <h4><?= $course->judul ?></h4>
            </td>
        </tr>
    </table>

    <table width="100%" style="font-size:18px; margin-top: 20px;">
        <!-- <tr>
            <td align="center" style="font-size:18px;">yang diselenggarakan pada </td>
        </tr> -->
        <tr>
            <td align="center"><?= longdate_indo(date('Y-m-d', strtotime($detail->timestamp))) ?></td>
        </tr>
    </table>
    <table width="100%" style="font-size:18px; margin-top: 20px;">
        
        <tr>
            <td align="center">
                <?php if($setting->ttd_sertifikat): ?>
                    <img src="<?= base_url('uploads/settings/' . $setting->ttd_sertifikat) ?>" alt="" style="height:90px; width: auto; ">
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td align="center"><?= $setting->nama_sertifikat ?></td>
        </tr><tr>
            <!-- <td align="center" width="50%">
                Makan
            </td> -->
            <td align="center" width="50%"><?= $setting->jabatan_sertifikat ?></td>
        </tr>
    </table>
    <table  width="100%" style="font-size:14px; margin-top: 70px; text-align: center; color: grey;">
        <tr>
            <td>
                <strong><i>Sertifikat dapat diverifikasi di <a href="<?= site_url('sertifikat') ?>">lingkaredukasi.com/sertifikat</a></i></strong>
                <br>
                <i>Lingkar Edukasi telah mengkonfirmasi keikutsertaan peserta dengan nama tertera di sertifikat ini</i>
            </td>
        </tr>
    </table>
</body