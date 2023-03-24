<div class="content-body" style="min-height: 925px;">
    <!-- row -->
    <div class="container-fluid">

        <div class="page-titles m-0 px-0 pt-0">
            <ol class="breadcrumb">
                <!-- <li class="breadcrumb-item"><a href="http://localhost/lingkar-edukasi/admin"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item"><a href="http://localhost/lingkar-edukasi/admin/course">Course</a></li> -->
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Verisikasi Tutor</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-xl-12 order-lg-1 order-2">
                <div class="border rounded mb-3">
                    <div class="card-body py-3">
                        <h4 class="fs-20 text-black font-w600">Perlu diperhatikan !!</h4>
                        <p class="fs-14 mb-0">Sebelum anda bisa mengupload Course, harap untuk mengirimkan informasi lengkap tentang course yang akan anda upload pada platform lingkar edukasi. Note: Sertakan juga link Drive video yang akan di upload. Proses verifikasi akan dilakukan paling lama 2x24 jam.</p>
                    </div>
                </div>
                <div class="card event-detail-bx overflow-hidden h-auto">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="http://localhost/lingkar-edukasi/admin/course/create" method="POST" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                    <p class="fs-14 mb-3">
                                        Jelaskan secara singkat course yang akan anda upload pada platform Lingkar Edukasi di kolom berikut. Jangan lupa untuk sertakan link drive di kolom berikutnya.</p>
                                        <textarea id="verifikasi" name="deskripsi" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Link Google Drive</label>
                                    <div class="col-sm-9">
                                        <input name="drive" type="text" class="form-control" placeholder="Link" required="">
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="button" class="btn btn-dark mr-2">Batal</button>
                                    <button type="submit" class="btn btn-primary">Verifikasi Seakarang</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="card event-detail-bx overflow-hidden h-auto">
                    <div class="card-body">
                        Verifikasi Sedang Berlangsung, Harap tunggu
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>