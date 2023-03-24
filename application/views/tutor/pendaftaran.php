<div class="content-body" style="min-height: 925px;">
    <!-- row -->
    <div class="container-fluid">

        <div class="page-titles m-0 px-0 pt-0">
            <ol class="breadcrumb">
                <!-- <li class="breadcrumb-item"><a href="http://localhost/lingkar-edukasi/admin"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item"><a href="http://localhost/lingkar-edukasi/admin/course">Course</a></li> -->
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Daftar Menjadi Tutor Lingkar Edukasi</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-xl-12 order-lg-1 order-2">
                <div class="card event-detail-bx overflow-hidden">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="http://localhost/lingkar-edukasi/admin/course/create" method="POST" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <input name="nama" type="text" class="form-control" placeholder="Tulis nama lengkap" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No WA/HP</label>
                                    <div class="col-sm-9">
                                        <input name="nomor" type="text" class="form-control" placeholder="Contoh: 0821xxxxx" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email Aktif</label>
                                    <div class="col-sm-9">
                                        <input name="email" type="text" class="form-control" placeholder="email@gmail.com" required="">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input name="password" type="password" class="form-control" placeholder="Password" required="">
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="button" class="btn btn-dark mr-2">Batal</button>
                                    <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>