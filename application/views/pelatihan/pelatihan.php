<div class="wrapper">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="col-sm-8">
                        <div class="form-group row">
                            <h4 class="mt-0 text-uppercase">Training Saya</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                if (is_array($datacategory) || is_object($datacategory)) {
                    $nonyaini = 1;
                    foreach ($datacategory as $get_category) {
                        $this->db->select('*');
                        $this->db->where(array('id' => $get_category->materi_cat_id));
                        $this->db->from('materi_category');
                        $category = $this->db->get()->row();

                ?>
                        <div class="col-sm-6 col-xl-3">
                            <div class="card border border-primary">
                                <div class="card-body">
                                    <a id="" data-trigger="hover" rel="popover" data-placement="right" href="" data-toggle="modal" data-target=".bs-example-modal-lg-training_<?= $category->id; ?>">
                                        <img class="card-img-top mx-auto d-block img-fluid" style="width: 240px; height: 135px" src="<?= base_url('assets/img/uploads/') . $category->foto; ?>" alt="thumbnail">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $category->nama; ?></h5>
                                            <div class="d-flex mb-2">
                                                <small class="text-muted" style="font-weight: 600">
                                                    <span class="text-muted mr-3"><span class="mdi mdi-book-multiple mr-1"></span>
                                                        <?php
                                                        $this->db->where(array('materi_cat_id' => $category->id));
                                                        $countmateri =  $this->db->count_all_results('materi');
                                                        echo $countmateri . " Materi";
                                                        ?>

                                                    </span>
                                                    <span class="text-muted mr-3"><span class="mdi mdi-clock mr-1"></span>
                                                        <?php
                                                        // Menjumlah jam materi
                                                        $this->db->select_sum('durasi');
                                                        $this->db->where(array('materi_cat_id' => $category->id));
                                                        $getmenit = $this->db->get('materi')->row()->durasi;
                                                        $getjam = round($getmenit / 60, 2);
                                                        echo $getjam . " Jam";
                                                        ?></span>
                                                    <span class="text-muted"><span class="fas fa-user-friends mr-1"></span>
                                                        <?php
                                                        // Menjumlah jam materi
                                                        $this->db->where(array('materi_cat_id' => $category->id));
                                                        $countpeople =  $this->db->count_all_results('users_materi_potition');
                                                        echo $countpeople . " Member";
                                                        ?></span>
                                                </small>
                                            </div>
                                            <p class="card-text"><?= $category->deskripsi; ?></p>
                                        </div>
                                    </a>
                                    <div>
                                        <?php
                                        // ambil total materi 
                                        $total_materi = $countmateri;

                                        // materi yang sudah berjalan 
                                        $this->db->where(array('materi_cat_id' => $category->id, 'nip' => $this->session->userdata('nip')));
                                        $materiberjalan =  $this->db->count_all_results('users_materi_potition');
                                        $getpersentase = round(($materiberjalan / $total_materi) * 100, 2);

                                        ?>
                                        <div class="progress mp-4" style="height: 6px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $getpersentase; ?>%" aria-valuenow="<?= $getpersentase; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="text-muted mt-2 mb-0"><?= "Materi yang dikerjakan " . $materiberjalan . ", dari total materi " . $total_materi; ?><span class="float-right"><?= $getpersentase; ?>%</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $this->db->select('*');
                        $this->db->from('materi');
                        $this->db->where(array('materi_cat_id' => $category->id));
                        $query = $this->db->get();
                        ?>
                        <!--  Modal content for the above example -->
                        <div class="modal fade bs-example-modal-lg-training_<?= $category->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title mt-0" id="myLargeModalLabel">Category : <?= $category->nama; ?></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <table id="datatable<?= $nonyaini++; ?>" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Nama Materi</th>
                                                            <th class="text-center">Nama Trainer</th>
                                                            <th class="text-center">Passing Grade</th>
                                                            <th class="text-center">Durasi Test</th>
                                                            <th class="text-center">Deskripsi</th>
                                                            <th class="text-center">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if (is_array($query->result()) || is_object($query->result())) {
                                                            foreach ($query->result() as $materilistnya) {
                                                                // Cari apa kah data soal ada , kalau tidak ada maka tidak tampil -->
                                                                $this->db->select('*');
                                                                $this->db->from('materi_soal');
                                                                $this->db->where(array('materi_id' => $materilistnya->id));
                                                                $query_getsoal = $this->db->get()->result();
                                                                if (is_array($query_getsoal) || is_object($query_getsoal)) {
                                                        ?>

                                                                    <tr>
                                                                        <td class="text-center"><?= $materilistnya->judul; ?></td>
                                                                        <td class="text-center"><?= $this->session->userdata('nama'); ?></td>
                                                                        <td class="text-center"><?= $materilistnya->passinggrade; ?></td>
                                                                        <td class="text-center"><?= $materilistnya->durasi; ?> Menit</td>
                                                                        <td class="text-center"><span class="btn btn-info font-14 header-title" onclick="getdataRead('<?= $materilistnya->id; ?>')">read</span></td>
                                                                        <?php
                                                                        $this->db->select('*');
                                                                        $this->db->from('users_materi_potition');
                                                                        $this->db->where(array('materi_id' => $materilistnya->id, 'nip' => $this->session->userdata('nip')));
                                                                        $status_user = $this->db->get()->num_rows();
                                                                        if ($status_user > 0) {
                                                                        ?>
                                                                            <td class='text-center'><span class='btn btn-danger font-14 header-title'>Sudah Di Ambil</span></td>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <td class='text-center'><a href="<?= base_url('soal?id=') . $materilistnya->id; ?>" class='btn btn-success font-14 header-title'>Kerjakan</a></td>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <!-- <td>      
                                        <span style="width:113px">                                                            
                                            <a href="<?php  ?>" name="edit" class="btn btn-primary m-btn m-btn--icon btn-lg m-btn--icon-only" data-toggle="modal" data-target=".bs-example-modal-lg-edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        <span>                                                            
                                    </td>
                                    <td>
                                        <span style="width:113px">                                                            
                                            <a href="#" name="<?php; ?>" class="hapus btn btn-danger m-btn m-btn--icon btn-lg m-btn--icon-only deletekar" kode="<?php ?>" data-toggle="modal" data-target=".bs-example-modal-center-delete">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </span>                                                                                                  
                                    </td> -->
                                                                    </tr>
                                                        <?php }
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"> Cancel</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    <?php
                    }
                } else { ?>
                    <div class="col-sm-6 col-xl-3 text-center">
                        <div class="card border border-primary">
                            <div class="card-body">
                                <h5 class="card-title">Anda belum mempunyai training yang terjadwal</h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <!-- <div class="col-sm-6 col-xl-3">
                    <div class="card border border-primary">
                        <a id="popoverOption" data-trigger="hover" rel="popover" data-placement="right" href="" data-toggle="modal" data-target=".bs-example-modal-lg-training">
                            <img class="card-img-top mx-auto d-block img-fluid" style="width: 240px; height: 135px" src="assets/img/tmb.jpg" alt="thumbnail">
                            <div class="card-body">
                                <h5 class="card-title">GENERAL-ALL</h5>
                                <div class="d-flex mb-2">
                                    <small class="text-muted" style="font-weight: 600">
                                        <span class="text-muted mr-3"><span class="mdi mdi-book-multiple mr-1"></span>3 Materi</span>
                                        <span class="text-muted mr-3"><span class="mdi mdi-clock mr-1"></span>1.5 Jam</span>
                                        <span class="text-muted"><span class="fas fa-user-friends mr-1"></span>30 Peserta</span>
                                    </small>
                                </div>
                                <p class="card-text">Berisi materi materi pelatihan yang mencakup pengetahuan umum yang harus dijaga</p>
                                <div>
                                    <div class="progress mp-4" style="height: 6px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="text-muted mt-2 mb-0">Progress Training<span class="float-right">90%</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg-training" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0" id="myLargeModalLabel">GENERALL-ALL</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-8" style="margin-left: 3%">
                                        <div class="form-group row">
                                            <h4 class="mt-0 header-title">33% of 3 object</h4>
                                            <p>Description : Berisi materi materi pelatihan yang mencakup pengetahuan umum Show 10 entries</p>
                                        </div>
                                    </div>
                                    <!-- <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button> -->
                                </div>


                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center"></th>
                                            <th class="text-center">Nama Materi</th>
                                            <th class="text-center">Nama Trainer</th>
                                            <th class="text-center">Passing Grade</th>
                                            <th class="text-center">Durasi Test</th>
                                            <th class="text-center">Deskripsi</th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center"><a href="<?= base_url('soal?id=1'); ?>"><span class="btn btn-success font-14 header-title">AMBIL</span></a></td>
                                            <td class="text-center">ERGONOMI</td>
                                            <td class="text-center">ULI LEARNING FACILITATOR</td>
                                            <td class="text-center">70</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center"><span class="btn btn-info font-14 header-title" data-toggle="modal" data-target=".bs-example-modal-center-read">read</span></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><span role="button" class="btn btn-danger font-14 header-title text-uppercase" aria-disabled="true">sudah AMBIL</span></td>
                                            <td class="text-center">ERGONOMI</td>
                                            <td class="text-center">ULI LEARNING FACILITATOR</td>
                                            <td class="text-center">70</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center"><span class="btn btn-info font-14 header-title" data-toggle="modal" data-target=".bs-example-modal-center-read">read</span></td>
                                            <td class="text-center"><span class="btn btn-danger font-14 header-title" data-toggle="modal" data-target=".bs-example-modal-center-lihat_lagi">lihat lagi</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
            <!-- <div class="modal-footer">                                                            
                <button type="button" id="" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"> Cancel</button>                                                                                                                        
                <button type="button" id="" class="btn btn-primary">Simpan</button>                                                            
            </div>     -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!---modal read-->
<div class="modal fade bs-example-modal-center-read" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">Info Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="p_read"></p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!---modal lihat materi-->
<div class="modal fade bs-example-modal-center-lihat_lagi" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">Deskripsi Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                            <span class="d-none d-md-block">File</span><span class="d-block d-md-none"><i class="mdi mdi-file h5"></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                            <span class="d-none d-md-block">Video</span><span class="d-block d-md-none"><i class="mdi mdi-video h5"></i></span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active p-3" id="home" role="tabpanel">
                                        <embed type="application/pdf" src="assets/file/materi/materi1.pdf" width="100%" height="720px"></embed>
                                    </div>
                                    <div class="tab-pane p-3" id="profile" role="tabpanel">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <video controls loop playsinline>
                                                <source src="assets/video/vid1.mp4" type="video/mp4" />
                                                Browsermu tidak mendukung ini, upgrade donk!
                                            </video>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
