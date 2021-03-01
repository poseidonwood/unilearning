<div class="wrapper">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <!-- end row -->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="col-sm-8">
                        <div class="form-group row">
                            <h3 class="mt-0 text-uppercase">Daftar Training</h3>
                            <!-- <button class="btn btn-primary pull-right" data-toggle="modal" data-target=".bs-example-modal-add_materi">Tambah Materi</button> -->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-right">
                        <span class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-add_category">Tambah Category</span>
                    </div>
                </div>

            </div>
            <!-- 
            <div class="row">
                <div class="col-sm-6 col-xl-3">
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
                            </div>
                        </a>
                        <div class="card-body">
                            <div class="text-right">
                                <span class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-add_materi">Tambah Materi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <?php
                if (is_array($datacategory) || is_object($datacategory)) {
                    $nonyaini = 1;
                    foreach ($datacategory as $category) {
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
                                                        $getjam = $getmenit / 60;
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
                                    <div class="text-right">
                                        <span class="btn btn-primary" onclick="tambahMateri('<?= $category->id; ?>')">Tambah Materi</span>
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
                                            <div class="col-md-12 table-responsive">
                                                <table id="datatable<?= $nonyaini++; ?>" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Nama Materi</th>
                                                            <th class="text-center">Nama Trainer</th>
                                                            <th class="text-center">Passing Grade</th>
                                                            <th class="text-center">Durasi Test</th>
                                                            <th class="text-center">Deskripsi</th>
                                                            <th class="text-center">Pretest Soal</th>
                                                            <th class="text-center">Posttest Soal</th>
                                                            <th class="text-center">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if (is_array($query->result()) || is_object($query->result())) {
                                                            foreach ($query->result() as $materilistnya) { ?>
                                                                <tr>
                                                                    <td class="text-center"><?= $materilistnya->judul; ?></td>
                                                                    <td class="text-center"><?= $this->session->userdata('nama'); ?></td>
                                                                    <td class="text-center"><?= $materilistnya->passinggrade; ?></td>
                                                                    <td class="text-center"><?= $materilistnya->durasi; ?> Menit</td>
                                                                    <td class="text-center"><span class="btn btn-info font-14 header-title" onclick="getdataRead('<?= $materilistnya->id; ?>')">read</span></td>
                                                                    <?php
                                                                    $this->db->select('*');
                                                                    $this->db->from('materi_soal');
                                                                    $this->db->where(array('materi_id' => $materilistnya->id, 'category_soal' => 'pretest'));
                                                                    $pretest_data = $this->db->get()->num_rows();
                                                                    if ($pretest_data > 0) {
                                                                    ?>
                                                                        <td class='text-center'><span class='btn btn-success font-14 header-title' onclick="editSoal('<?= $materilistnya->id; ?>','<?= $materilistnya->judul; ?>','pretest')">Soal Sudah Ada</span></td>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <td class='text-center'><span class='btn btn-danger font-14 header-title' onclick="createSoal('<?= $materilistnya->id; ?>','<?= $materilistnya->judul; ?>','pretest')">Belum Ada Soal</span></td>
                                                                    <?php
                                                                    }
                                                                    $this->db->select('*');
                                                                    $this->db->from('materi_soal');
                                                                    $this->db->where(array('materi_id' => $materilistnya->id, 'category_soal' => 'posttest'));
                                                                    $posttest_data = $this->db->get()->num_rows();
                                                                    if ($posttest_data > 0) {
                                                                    ?>
                                                                        <td class='text-center'><span class='btn btn-success font-14 header-title' onclick="editSoal('<?= $materilistnya->id; ?>','<?= $materilistnya->judul; ?>','posttest')">Soal Sudah Ada</span></td>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <td class='text-center'><span class='btn btn-danger font-14 header-title' onclick="createSoal('<?= $materilistnya->id; ?>','<?= $materilistnya->judul; ?>','posttest')">Belum Ada Soal</span></td>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                    <td class="text-center"><span class="btn btn-primary font-14 header-title" onclick="getdataRead('<?= $materilistnya->id; ?>')">Delete</span></td>

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
                                <h5 class="card-title">Anda belum membuat category materi</h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- content -->
</div>

<!---modal add materi-->
<div class="modal fade bs-example-modal-add_materi" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">Tambah Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('daftar_training_trainer/buatmateri'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label">Nama Materi</label>
                                <input class="form-control" required type="text" value="" name="judul" id="" required>
                                <input class="form-control" required type="hidden" value="" id="inimatericatid" required>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label">Nama Trainer</label>
                                <input class="form-control" readonly required type="text" value="<?= $this->session->userdata('nama'); ?>" id="" required>
                                <input class="form-control" readonly required type="hidden" name="author" value="<?= $this->session->userdata('nip'); ?>" id="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label">Passing Grade</label>
                                <input class="form-control" required type="text" value="" id="" name="passinggrade">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label">Durasi Test (Menit)</label>
                                <input class="form-control" required type="number" value="" id="" name="durasi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label">Deskripsi</label>
                                <textarea class="form-control" type="text" value="" id="" name="isi" id="" cols="30" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-sm-12">
                                <label class="control-label">Materi dan Soal</label>
                                <div class="form-group col-sm-12">
                                    <label>Upload File <small class="form-text text-muted">Upload hanya dengan format: pdf</small> </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="document" id="customFile" accept=".pdf">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Upload Vidio <small class="form-text text-muted">Upload dengan format mp4</small></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="video" id="customFile" accept=".mp4">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"> Cancel</button>
                <button type="submit" id="" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!---modal add category-->
<div class="modal fade bs-example-modal-add_category" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">Tambah Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('daftar_training_trainer/category'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label">Nama Category</label>
                                <input class="form-control" name="nama" required type="text" value="" id="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label">Author</label>
                                <input class="form-control" readonly name="author" required type="text" value="<?= $this->session->userdata('nip'); ?>" id="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" type="text" value="" id="" name="" id="" cols="30" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-sm-12">
                                <label class="control-label">Thumbnails</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="fotonya" id="inputGroupFile04" accept="image/*,.pdf">
                                        <label class=" custom-file-label" for="inputGroupFile04">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"> Cancel</button>
                <button type="submit" id="" class="btn btn-primary">Simpan</button>
            </div>
            </form>
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

<!---modal materi-->
<div class="modal fade bs-example-modal-isi_materi" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">Upload Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <span id="filesupload"></span>
                        <div class="col-sm-12">
                            <label>Upload File</label>
                            <div class="row">
                                <div class="col-sm-12 mt-2">
                                    <!-- <form action="" class="form_horizontal" id="images" enctype="multipart/form-data" method="post" accept-charset="utf-8"> -->
                                    <small class="form-text text-muted">Upload hanya dengan format: pdf</small>
                                    <input type="file" name="fil_materi" onChange="upload_file2(1)" id="userfile1" accept=".pdf">
                                    <input type="hidden" name="fileupload[]" id="fileupload1">
                                    <!-- </form>                 -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <span id="filesupload"></span>
                        <div class="col-sm-12">
                            <label>Upload Vidio</label>
                            <div class="row">
                                <div class="col-sm-12 mt-2">
                                    <!-- <form action="" class="form_horizontal" id="images" enctype="multipart/form-data" method="post" accept-charset="utf-8"> -->
                                    <small class="form-text text-muted">Upload dengan format mp4</small>
                                    <input type="file" name="video_materi" onChange="upload_file2(1)" id="userfile1" accept=".mp4">
                                    <input type="hidden" name="fileupload[]" id="fileupload1">
                                    <!-- </form>                 -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!---modal isi soal-->
<div class="modal fade bs-example-modal-isi_soal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="judulsoal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Nav tabs -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-toggle="tab" href="#soal-1" role="tab">
                                    <span class="d-none d-md-block">1</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" href="#soal-2" role="tab">
                                    <span class="d-none d-md-block">2</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" href="#soal-3" role="tab">
                                    <span class="d-none d-md-block">3</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" href="#soal-4" role="tab">
                                    <span class="d-none d-md-block">4</span><span class="d-block d-md-none"><i class="mdi mdi-settings h5"></i></span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" href="#soal-5" role="tab">
                                    <span class="d-none d-md-block">5</span><span class="d-block d-md-none"><i class="mdi mdi-settings h5"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <form action="<?= base_url('daftar_training_trainer/buatsoal'); ?>" method="post">
                    <input type="hidden" name="materi_id" id="materi_idnya">
                    <input type="hidden" name="category_soal" id="category_soalnya">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="soal-1" role="tabpanel">
                            <div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Soal 1</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Soal</label>
                                            <textarea name="soal1" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Jawaban</label>
                                            <textarea name="jawaban1" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 1</label>
                                            <textarea name="pilihan1a" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 2</label>
                                            <textarea name="pilihan1b" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 3</label>
                                            <textarea name="pilihan1c" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 4</label>
                                            <textarea name="pilihan1d" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane p-3" id="soal-2" role="tabpanel">
                            <div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Soal 2</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Soal</label>
                                            <textarea name="soal2" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Jawaban</label>
                                            <textarea name="jawaban2" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 1</label>
                                            <textarea name="pilihan2a" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 2</label>
                                            <textarea name="pilihan2b" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 3</label>
                                            <textarea name="pilihan3c" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 4</label>
                                            <textarea name="pilihan3d" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-3" id="soal-3" role="tabpanel">
                            <div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Soal 3</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Soal</label>
                                            <textarea name="soal3" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Jawaban</label>
                                            <textarea name="jawaban3" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 1</label>
                                            <textarea name="pilihan3a" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 2</label>
                                            <textarea name="pilihan3b" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 3</label>
                                            <textarea name="pilihan3c" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 4</label>
                                            <textarea name="pilihan3d" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-3" id="soal-4" role="tabpanel">
                            <div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Soal 4</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Soal</label>
                                            <textarea name="soal4" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Jawaban</label>
                                            <textarea name="jawaban4" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 1</label>
                                            <textarea name="pilihan4a" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 2</label>
                                            <textarea name="pilihan4b" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 3</label>
                                            <textarea name="pilihan4c" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 4</label>
                                            <textarea name="pilihan4d" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-3" id="soal-5" role="tabpanel">
                            <div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Soal 5</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Soal</label>
                                            <textarea name="soal5" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Jawaban</label>
                                            <textarea name="jawaban5" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 1</label>
                                            <textarea name="pilihan5a" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 2</label>
                                            <textarea name="pilihan5b" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 3</label>
                                            <textarea name="pilihan5c" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Option 4</label>
                                            <textarea name="pilihan5d" class="form-control" id="" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center>
                            <p>Jika di tekan tombol "Save All" tidak ada response, Tolong cek lagi isian anda..!</p>
                        </center>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="" class="btn btn-primary">Save All</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->