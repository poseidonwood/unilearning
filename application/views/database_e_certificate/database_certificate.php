<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="page-title-box">
            <!-- end row -->
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <h4 class="mt-0 header-title">list data E-Certificate</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="form-group col-sm-4">
                                        <label for="">Filter Factory</label>
                                        <select class="form-control js-example-basic-single" name="" id="" style="width: 100%;">
                                            <option value="0">Filter Factory</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="">Filter Line Manager</label>
                                        <select class="form-control js-example-basic-single" name="" id="" style="width: 100%;">
                                            <option value="0">Filter Line Manager</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="">Filter SIO Type</label>
                                        <select class="form-control js-example-basic-single" name="" id="" style="width: 100%;">
                                            <option value="0">Filter SIO Type</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group col-sm-4">
                                        <label for="">Tanggal Awal</label>
                                        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="">Tanggal Akhir</label>
                                        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="mt-4 pt-1">
                                            <a onclick="" class="btn btn-info" href="javascript:void(0)">Filter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 text-right mt-4">
                                <div class="form-group button-items btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg-create">
                                    <span>
                                        <i class="fas fa-plus-circle"></i>
                                        <span>
                                            Tambah
                                        </span>
                                    </span>
                                    </a>
                                </div>

                                <div class="form-group button-items btn btn-primary" id="import">
                                    <span>
                                        <i class="fas fa-file-import"></i>
                                        <span>
                                            Import
                                        </span>
                                    </span>
                                    </a>
                                </div>

                                <div class="btn-group mb-3">
                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-download"></i>
                                        <span>
                                            Download
                                        </span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" target="_BLANK" href="#">PDF</a>
                                        <a class="dropdown-item" href="#">Excel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($error)) {
                            echo $error;
                        } ?>
                        <?php if (($this->session->flashdata('error')) !== null) {
                            echo $this->session->flashdata('error');
                        } ?>
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="align-middle">No.</th>
                                        <th class="align-middle">Code ID</th>
                                        <th class="align-middle">NIP</th>
                                        <th class="align-middle">Nama Karyawan</th>
                                        <th class="align-middle">
                                            Line Manager
                                        </th>
                                        <th class="align-middle">
                                            Factory
                                        </th>
                                        <th class="align-middle">Certificate No.</th>
                                        <th class="align-middle">SIO No.</th>
                                        <th class="align-middle">
                                            SIO Type
                                        </th>
                                        <th class="align-middle">Yang Mengeluarkan</th>
                                        <th class="align-middle">Tanggal Terbit</th>
                                        <th class="align-middle">Tanggal Expired</th>
                                        <th class="align-middle">Reminder</th>
                                        <th class="align-middle">PIC Reminder</th>
                                        <th class="align-middle">PIC Line Manager Reminder</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">Notes</th>
                                        <th class="align-middle">Files</th>
                                        <th class="align-middle">Edit</th>
                                        <th class="align-middle">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    if ($cekdata == null) {
                                        echo "<tr><td colspan='13' style ='text-align:center' >Data Belum Tersedia</td></tr>";
                                    } else {
                                        foreach ($cekdata as $datacertificate) {
                                            $tanggal_sekarang = new DateTime(date('Y-m-d'));
                                            $tanggal_expired = new DateTime($datacertificate->tanggal_expired);
                                            $interval = $tanggal_sekarang->diff($tanggal_expired);
                                            $reminder = $interval->format('%a Hari');
                                            //calling who is linemanager
                                            $this->db->select('*');
                                            $this->db->from('karyawan');
                                            $this->db->where(array('nip' => $datacertificate->linemanager));
                                            $querylm = $this->db->get();
                                            if ($querylm->num_rows() == 0) {
                                                $q_lm = FALSE;
                                            } else {
                                                $q_lm = $querylm->row();
                                            }

                                            // Calling who is PIC
                                            $this->db->select('*');
                                            $this->db->from('karyawan');
                                            $this->db->where(array('nip' => $datacertificate->pic));
                                            $querypic = $this->db->get();
                                            if ($querypic->num_rows() == 0) {
                                                $q_pic = FALSE;
                                            } else {
                                                $q_pic = $querypic->row();
                                            }

                                            echo "
    <tr>
                                        <td>" . $no++ . "</td>
                                        <td>$datacertificate->kode</td>
                                        <td>$datacertificate->nip</td>
                                        <td>$datacertificate->nama</td>
                                        <td>$datacertificate->linemanager - ($q_lm->nama)</td>
                                        <td></td>
                                        <td>$datacertificate->no_certificate</td>
                                        <td>$datacertificate->no_lisensi</td>
                                        <td>$datacertificate->nama_certificate</td>                                                                                                                                                
                                        <td>$datacertificate->provider</td>
                                        <td>$datacertificate->tanggal_terbit</td>
                                        <td>$datacertificate->tanggal_expired</td>                                
                                        <td>$reminder</td>
                                        <td>$datacertificate->pic - ($q_pic->nama)</td>
                                        <td></td>
                                        <td class='text-center'> <button type='button' class='btn btn-success btn-sm waves-effect waves-light'>Valid</button>
                                        <button type='button' class='btn btn-warning btn-sm waves-effect waves-light'>Process</button>
                                        <button type='button' class='btn btn-danger btn-sm waves-effect waves-light'>Expired</button>
                                        </td>
                                        <td>$datacertificate->note</td>
                                      <!--  <td>$datacertificate->files</td>-->
                                      ";
                                    ?>
                                            <td>
                                                <span style='width:113px'>
                                                    <a href='<?php  ?>' name='file' class='btn btn-info m-btn m-btn--icon btn-lg m-btn--icon-only' data-toggle='modal' data-target='.bs-example-modal-sm-file-$datacertificate->kode'>
                                                        <i class='mdi mdi-file-document'></i>
                                                    </a>
                                                    <span>
                                            </td>
                                            <td>
                                                <span style='width:113px'>
                                                    <a href='#' name='edit' class='btn btn-primary m-btn m-btn--icon btn-lg m-btn--icon-only' onclick="EditEcertificate('<?= $datacertificate->kode; ?>')">
                                                        <i class='fas fa-pencil-alt'></i>
                                                    </a>
                                                    <span>
                                            </td>
                                            <td>
                                                <span style='width:113px'>
                                                    <a href='#' class='btn btn-danger m-btn m-btn--icon btn-lg m-btn--icon-only' onclick="deleteData('<?= $datacertificate->kode; ?>','<?= $datacertificate->nama_certificate; ?>')">
                                                        <i class='far fa-trash-alt'></i>
                                                    </a>
                                                </span>
                                            </td>
                                            </tr>

                                    <?php
                                        }
                                    }

                                    ?>
                                    </body>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-6 col-md-3 m-t-30">
    <div id="modalFile" class="modal fade bs-example-modal-sm-file-<?= $datacertificate->kode; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="mySmallModalLabel">File Piagam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table width="100%">
                        <tr>
                            <td><a href="" data-toggle='modal' data-target='.bs-example-modal-tampil_file-<?= $datacertificate->kode; ?>'><?= $datacertificate->nama_certificate; ?></a></td>
                            <td>
                                <span style="width:113px">
                                    <a href="#" name="<?php?>" class="tampilkan btn btn-danger m-btn m-btn--icon btn-lg m-btn--icon-only deletekar" kode="<?php ?>" data-toggle="modal" data-target=".bs-example-modal-center-delete_file">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

<!---modal confirm tampil file-->
<div class="modal fade bs-example-modal-tampil_file-<?= $datacertificate->kode; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <?php $row = 1;
                if ($row == '1') { ?>
                    <img src="<?= base_url("assets/img/uploads/") . $datacertificate->files; ?>" alt="" width="100%" style="100%">
                <?php } else { ?>
                    <!-- <embed type="application/pdf" src="assets/file/materi/materi1.pdf" width="100%" height="720px"></embed> -->
                <?php } ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- <script>
    $('body').on('click', '.tampilkan', function(){
       
        $("#modalFile").modal("hide");        
       
    });
</script> -->
<!---modal confirm delete-->
<div class="modal fade bs-example-modal-center-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <input type="hidden" name="idhapus" id="idhapus"> -->
                <p>Apakah anda yakin ingin menghapus <strong class="text-konfirmasi"> </strong> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade bs-example-modal-center-delete_file" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <input type="hidden" name="idhapus" id="idhapus"> -->
                <p>Apakah anda yakin ingin menghapus file <strong class="text-konfirmasi"> </strong> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!--  Modal content for create -->
<div class="modal fade bs-example-modal-lg-create" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah Certificate</h5>
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
                                    <div class="col-md-6">
                                        <form action="<?= base_url('database_e_certificate/proses'); ?>" class="form_horizontal" id="images" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                            <div class=" form-group col-md-12">
                                                <div class="col-sm-12">
                                                    <label for="">Code ID</label>
                                                    <input class="form-control" type="text" name="kode" value="<?= $kode; ?>" id="" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <div class="col-sm-12">
                                                    <label for="">Certificate Factory</label>
                                                    <select class="form-control js-example-basic-single" name="" id="" style="width: 100%;">
                                                        <option value="0">-- Choice Certificate Factory --</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <div class="col-sm-12">
                                                    <label for="">Certificate No.</label>
                                                    <input class="form-control" type="text" name="no_certificate" value="" id="" placeholder="Input No Certificate" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <div class="col-sm-12">
                                                    <label for="">SIO No.</label>
                                                    <input class="form-control" type="text" name="no_lisensi" value="" id="" placeholder="Input No Lisensi" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <div class="col-sm-12">
                                                    <label for="">Certificate Name</label>
                                                    <input class="form-control" type="text" name="nama_certificate" value="" id="" placeholder="Input Nama Certificate">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <div class="col-sm-12">
                                                    <label for="">Provider</label>
                                                    <input class="form-control" type="text" name="provider" value="" id="" placeholder="Input Provider yang mengeluarkan Certificate">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <div class="form-group col-md-12">
                                                    <label>Scan / Foto File</label>
                                                    <!-- <form action="" class="form_horizontal" id="images" enctype="multipart/form-data" method="post" accept-charset="utf-8"> -->
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <small class="form-text text-muted">Upload dengan format: png, jpg, jpeg, atau pdf <br> Dengan makimal ukuran/size: 2 MB</small>
                                                            <input type="file" name="filenya" onChange="upload_file2(1)" id="userfile1" accept="image/*,.pdf">
                                                            <input type="hidden" name="fileupload[]" id="fileupload1">
                                                        </div>
                                                        <span class="addinput"></span>
                                                        <!-- </form>                 -->
                                                        <!-- <div class="col-md-4 mt-3">
                                                            <button type="button" class="btn btn-info" id="tambah_upload">Tambah Upload</button>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group col-md-12">
                                            <div class="col-sm-12">
                                                <label for="">Nama Karyawan</label>
                                                <!-- <div class="input-group mb-3">
                                                    <input class="form-control" type="text" name="nm_karyawan" value="" id="nm_karyawan" placeholder="Input Nama Karyawan" readonly>
                                                    <span class="input-group-text btn-success" data-toggle='modal' data-target='.bs-example-modal-nama_karyawan'><i class="fa fa-plus"></i></span>
                                                </div> -->
                                                <select class="form-control js-example-basic-single" name="nm_karyawan" style="width: 100%;">
                                                    <option value="0">-- Pilih Nama Karyawan --</option>
                                                    <?php
                                                    foreach ($userdata as $user) {
                                                        echo "
                                                        <option value='$user->nip'>$user->nama ($user->department)</option>
                                           ";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="col-sm-12">
                                                <label for="">Tanggal Terbit</label>
                                                <input class="form-control" type="date" name="tanggal_terbit" value="" id="">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <div class="col-sm-12">
                                                <label for="">Tanggal Expired</label>
                                                <input class="form-control" type="date" name="tanggal_expired" value="" id="">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <div class="col-sm-12">
                                                <label for="">PIC Reminder</label>
                                                <!-- <div class="input-group mb-3">
                                                    <input class="form-control" type="text" name="pic" value="" id="" placeholder="Input PIC" readonly>
                                                    <span class="input-group-text btn-success" data-toggle='modal' data-target='.bs-example-modal-pic'><i class="fa fa-plus"></i></span>
                                                </div> -->
                                                <select class="form-control js-example-basic-single" name="pic" style="width: 100%;">
                                                    <option value="0">-- Pilih PIC Reminder --</option>
                                                    <?php
                                                    foreach ($userdata as $user) {
                                                        echo "
                                                        <option value='$user->nip'>$user->nama ($user->department)</option>
                                           ";
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <div class="col-sm-12">
                                                <label for="">Note</label>
                                                <textarea class="form-control" id="" name="note" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
            <div class="modal-footer">
                <button type="button" id="" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"> Cancel</button>
                <button type="submit" id="" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Edit -->
<div class="modal fade bs-example-modal-lg-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Edit Certificate</h5>
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
                                    <div class="col-md-6">
                                        <form action="<?= base_url('database_e_certificate/update'); ?>" class="form_horizontal" id="images" enctype="multipart/form-data" method="post" accept-charset="utf-8"">
                                            <div class=" form-group col-md-12">
                                            <div class="col-sm-12">
                                                <label for="">Code ID</label>
                                                <input class="form-control" type="text" name="kode" id="kode" value="<?= $kode; ?>" id="" readonly>
                                            </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="col-sm-12">
                                            <label for="">Certificate Factory</label>
                                            <select class="form-control js-example-basic-single" name="" id="" style="width: 100%;">
                                                <option value="0">-- Choice Certificate Factory --</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="col-sm-12">
                                            <label for="">Certificate No.</label>
                                            <input class="form-control" type="text" name="no_certificate" value="" id="no_certificate" placeholder="Input No Certificate" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="col-sm-12">
                                            <label for="">SIO No.</label>
                                            <input class="form-control" type="text" name="no_lisensi" value="" id="no_lisensi" placeholder="Input No Lisensi" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="col-sm-12">
                                            <label for="">Certificate Name</label>
                                            <input class="form-control" type="text" name="nama_certificate" value="" id="nama_certificate" placeholder="Input Nama Certificate">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="col-sm-12">
                                            <label for="">Provider</label>
                                            <input class="form-control" type="text" name="provider" value="" id="provider" placeholder="Input Provider yang mengeluarkan Certificate">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-12">
                                            <label>Scan / Foto File</label>
                                            <!-- <form action="" class="form_horizontal" id="images" enctype="multipart/form-data" method="post" accept-charset="utf-8"> -->
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <small class="form-text text-muted">Upload dengan format: png, jpg, jpeg, atau pdf <br> Dengan makimal ukuran/size: 2 MB</small>
                                                    <input type="file" name="filenya" onChange="upload_file2(1)" accept="image/*,.pdf">
                                                </div>
                                                <span class="addinput"></span>
                                                <!-- </form>                 -->
                                                <div class="col-md-4 mt-4">
                                                    <!-- <button type="button" class="btn btn-info" id="tambah_upload">Tambah Upload</button> -->
                                                    <p id="filenya">test.jpg</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group col-md-12">
                                        <div class="col-sm-12">
                                            <label for="">Nama Karyawan</label>
                                            <!-- <div class="input-group mb-3">
                                                    <input class="form-control" type="text" name="nm_karyawan" value="" id="nm_karyawan" placeholder="Input Nama Karyawan" readonly>
                                                    <span class="input-group-text btn-success" data-toggle='modal' data-target='.bs-example-modal-nama_karyawan'><i class="fa fa-plus"></i></span>
                                                </div> -->
                                            <select class="form-control js-example-basic-single" name="nm_karyawan" id="nm_karyawan" style="width: 100%;">
                                                <option value="0">-- Pilih Nama Karyawan --</option>
                                                <?php
                                                foreach ($userdata as $user) {
                                                    echo "
                                                        <option value='$user->nip'>$user->nama ($user->department)</option>
                                           ";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="col-sm-12">
                                            <label for="">Tanggal Terbit</label>
                                            <input class="form-control" type="date" name="tanggal_terbit" value="" id="tanggal_terbit">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="col-sm-12">
                                            <label for="">Tanggal Expired</label>
                                            <input class="form-control" type="date" name="tanggal_expired" value="" id="tanggal_expired">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="col-sm-12">
                                            <label for="">PIC Reminder</label>
                                            <!-- <div class="input-group mb-3">
                                                    <input class="form-control" type="text" name="pic" value="" id="" placeholder="Input PIC" readonly>
                                                    <span class="input-group-text btn-success" data-toggle='modal' data-target='.bs-example-modal-pic'><i class="fa fa-plus"></i></span>
                                                </div> -->
                                            <select class="form-control js-example-basic-single" name="pic" id="pic" style="width: 100%;">
                                                <option value="0">-- Pilih PIC Reminder --</option>
                                                <?php
                                                foreach ($userdata as $user) {
                                                    echo "
                                                        <option value='$user->nip'>$user->nama ($user->department)</option>
                                           ";
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="col-sm-12">
                                            <label for="">Note</label>
                                            <textarea class="form-control" id="note" name="note" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
        <div class="modal-footer">
            <button type="button" id="" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"> Cancel</button>
            <button type="submit" id="" class="btn btn-primary">Simpan</button>
            </form>

        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for pic -->
<div class="modal fade bs-example-modal-pic" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">PIC</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable-baru1" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="10%">No.</th>
                                                <th class="text-center" width="40%">NIP</th>
                                                <th class="text-center" width="50%">Nama</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>a</td>
                                                <td>a</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
            <div class="modal-footer">
                <button type="button" id="" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"> Cancel</button>
                <button type="button" id="" class="btn btn-primary">Simpan</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for pic -->
<div class="modal fade bs-example-modal-nama_karyawan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Nama Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable-baru" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="10%">No.</th>
                                                <th class="text-center" width="40%">NIP</th>
                                                <th class="text-center" width="50%">Nama</th>
                                                <th class="text-center" width="50%">Line Manager</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
            <div class="modal-footer">
                <button type="button" id="" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"> Cancel</button>
                <button type="button" id="" class="btn btn-primary">Simpan</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!---modal confirm import-->
<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Import Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="m-b-30">
                            <form method="post" action="<?= base_url('database_e_certificate/importExcel') ?>" enctype="multipart/form-data">
                                <small class="form-text text-left font-14 text-muted">Upload dengan format: xlsx,csv <br> Dengan makimal ukuran/size: 2 MB</small>
                                <input type="file" id="upload2" name="excelimport" id="userfile1" accept=".csv,.xlsx,.xls">
                                <!-- <div class="filepond--root">
                                    <input type="file" class="my-pond" name="excelimport" id="userfile1" accept=".csv,.xlsx,.xls">
                                </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center m-t-5 mb-5">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Import Files</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->