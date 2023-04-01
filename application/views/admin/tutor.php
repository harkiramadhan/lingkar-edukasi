<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
            <div class="mb-3 mr-3">
                <h6 class="fs-16 text-black font-w600 mb-0"><?= $tutor->num_rows() ?> Total Tutor</h6>
                <span class="fs-14">Berdasarkan preferensi anda</span>
            </div>
            <div class="d-flex mb-3">
                <!-- <a href="javascript:void(0)" class="btn btn-primary text-nowrap">+ Kelas</a> -->
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="tab-content">
                    <div id="All" class="tab-pane active fade show">
                        <div class="table-responsive">
                            <table id="example2" class="table card-table display dataTablesCard">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No</th>
                                        <th>Tutor</th>
                                        <th class="text-center" width="10%">Course</th>
                                        <th class="text-center" width="20%">Status</th>
                                        <th class="text-center" width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach($tutor->result() as $row){ 
                                            $cekCourse = $this->db->get_where('courses', ['pemateriid' => $row->id]);
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td>
                                                <span class="text-nowrap font-weight-bold"><?= $row->nama ?></span>
                                            </td>
                                            <td class="text-center"><?= $cekCourse->num_rows() ?></td>
                                            <td class="text-center">
                                                <?php if($row->status == 0): ?>
                                                    <span class="badge light badge-warning">Belum Mengajukan</span>
                                                <?php elseif($row->status == 1): ?>
                                                    <span class="badge light badge-warning">Mengajukan</span>
                                                    <button type="button" class="btn btn-warning btn-sm dark ml-0 px-3 py-1 mr-0 btn-detail-ajuan" data-id="<?= $row->id ?>"><i class="fa fa-file-text"></i></button>
                                                <?php elseif($row->status == 2): ?>
                                                    <span class="badge light badge-success">Diterima</span>
                                                <?php elseif($row->status == 3): ?>
                                                    <span class="badge light badge-danger">Ditolak</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" data-id="<?= $row->id ?>" class="btn btn-secondary btn-sm dark ml-0 px-2 py-1 mr-0"><i class="fa fa-eye"></i></button>
                                                <button type="button" data-id="<?= $row->id ?>" class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0 btn-edit"><i class="fa fa-pencil"></i></button>
                                                <button type="button" data-id="<?= $row->id ?>" class="btn btn-danger  bbtn-sm dark ml-0 px-2 py-1 mr-0 btn-remove"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->
<div class="modal fade" id="modal-ajuan">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content ajuan-content">
            
        </div>
    </div>
</div>