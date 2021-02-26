<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="page-title-box">
            <!-- end row -->
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-30">
                    <div class="card-body">                        

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">
                                    <span class="d-none d-md-block">Data Karyawan</span><span class="d-block d-md-none"><i class="fas fa-users"></i></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#home" role="tab">
                                    <span class="d-none d-md-block">Data User</span><span class="d-block d-md-none"><i class="fas fa-users-cog"></i></span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane p-3" id="home" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group row">
                                            <h4 class="mt-0 mb-4 header-title">data user</h4>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4 text-right">
                                        <div class="form-group button-items btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg-create_user">                                           
                                            <span>
                                                <i class="fas fa-plus-circle"></i>
                                                <span>
                                                    Tambah
                                                </span>
                                            </span>
                                            </a>
                                        </div>

                                        <div class="form-group button-items btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-import-user">                                           
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
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" target="_BLANK" href="#">PDF</a>
                                                <a class="dropdown-item" href="#">Excel</a>
                                            </div>
                                        </div> 
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Employee ID</th>
                                                <th>Employee Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Tanggal Terbit</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($datauser as $userlist) {
                                                if ($userlist->status == "aktif") {
                                                    $status = "<span class='badge badge-pill badge-success'>AKTIF</span>";
                                                } else {
                                                    $status = "<span class='badge badge-pill badge-danger'>NON- AKTIF</span>";
                                                }
                                                // get nama by nip
                                                $this->db->select('nama');
                                                $this->db->from('karyawan');
                                                $this->db->where(array('nip' => $userlist->nip));
                                                $qnama = $this->db->get();
                                                if ($qnama->num_rows() > 0) {
                                                    $nama = $qnama->row()->nama;
                                                } else {
                                                    $nama = "TIDAK ADA DI KARYAWAN LIST";
                                                }
                                                echo
                                                "<tr>
                                            <td>" . $no++ . "</td>
                                            <td>$userlist->nip</td>
                                            <td>$nama</td>
                                            <td>$userlist->email</td>
                                            <td>$userlist->role</td>
                                            <td>$status</td>
                                            <td>$userlist->tanggal_terbit</td>";
                                            ?>
                                                <td>
                                                    <span style="width:113px">
                                                        <a href="#" name="edit" class="btn btn-primary m-btn m-btn--icon btn-lg m-btn--icon-only" onclick="EditUser('<?= $userlist->id; ?>','<?= $nama; ?>')">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <span>
                                                </td>
                                                <td>
                                                    <span style="width:113px">
                                                        <a href="#" class="hapus btn btn-danger m-btn m-btn--icon btn-lg m-btn--icon-only deletekar" onclick="deleteUser('<?= $userlist->id; ?>','<?= $nama; ?>')">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                    </span>
                                                </td>
                                                </tr>
                                            <?php
                                            } ?>
                                            </body>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane active p-3" id="profile" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group row">
                                            <h4 class="mt-0 mb-4 header-title">data karyawan</h4>
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-4 text-right">
                                        <div class="form-group button-items btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg-create_karyawan">                                            
                                            <span>
                                                <i class="fas fa-plus-circle"></i>
                                                <span>
                                                    Tambah
                                                </span>
                                            </span>
                                            </a>
                                        </div>

                                        <div class="form-group button-items btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-import-karyawan">                                           
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
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" target="_BLANK" href="#">PDF</a>
                                                <a class="dropdown-item" href="#">Excel</a>
                                            </div>
                                        </div> 
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th>Employee ID</th>
                                                <th>Employee Name</th>
                                                <th>Email</th>
                                                <th>Department</th>
                                                <th>Factory</th>
                                                <th>No. Hp</th>
                                                <th>Status</th>
                                                <th>Created at</th>
                                                <th>Update at</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($datakaryawan as $karyawanlist) {
                                                if ($karyawanlist->status == "aktif") {
                                                    $status_kar = "<span class='badge badge-pill badge-success'>AKTIF</span>";
                                                } else {
                                                    $status_kar = "<span class='badge badge-pill badge-danger'>NON- AKTIF</span>";
                                                }
                                                echo "<tr>
                                                <td>" . $no++ . "</td>
                                                <td><img src='" . base_url('assets/img/user/') . $karyawanlist->photo . "' alt='$karyawanlist->photo' width='100px'></td>
                                                <td>$karyawanlist->nip</td>
                                                <td>$karyawanlist->nama</td>
                                                <td>$karyawanlist->email</td>
                                                <td>$karyawanlist->department</td>
                                                <td>$karyawanlist->location</td>
                                                <td>$karyawanlist->telepon</td>
                                                <td>$status_kar</td>
                                                <td>$karyawanlist->created_at</td>
                                                <td>$karyawanlist->update_at</td>
                                                ";
                                            ?>
                                                <td>
                                                    <span style="width:113px">
                                                        <a href="#" onclick="EditKaryawan('<?= $karyawanlist->nip; ?>','<?= $karyawanlist->nama; ?>')" class="btn btn-primary m-btn m-btn--icon btn-lg m-btn--icon-only">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <span>
                                                </td>
                                                <td>
                                                    <span style="width:113px">
                                                        <a href="#" class="hapus btn btn-danger m-btn m-btn--icon btn-lg m-btn--icon-only deletekar" onclick="deleteKaryawan('<?= $karyawanlist->nip; ?>','<?= $karyawanlist->nama; ?>')">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                    </span>
                                                </td>
                                                </tr>
                                            <?php
                                            } ?>
                                            </body>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!---modal confirm delete user-->
<div class="modal fade bs-example-modal-center-delete_user" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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

<!---modal confirm delete karyawan-->
<div class="modal fade bs-example-modal-center-delete_karyawan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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

<!--  Modal content for create -->
<div class="modal fade bs-example-modal-lg-create_user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('user/proses'); ?>">
                    <div class="row">
                        <div class=" form-group col-md-6">
                            <div class="col-sm-12">
                                <h5 class="card-title">
                                    <div id="result_search"><small>Masukkan NIP => Tunggu Status NIP nya</small></div>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" form-group col-md-6">
                            <div class="col-sm-12">
                                <label for="">NIP</label>
                                <input class="form-control" onkeyup="searchnip()" name="nip" placeholder="Masukkan NIP" required type="number" id="nip_users" autofocus>
                            </div>
                        </div>
                        <div class=" form-group col-md-6">
                            <div class="col-sm-12">
                                <label for="">Email</label>
                                <input class="form-control" name="email" placeholder="Masukkan Email" required type="text" id="email_users" disabled required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="col-sm-12">
                                <label for="">Password</label>
                                <input class="form-control" required type="password" name="password1" placeholder="Masukkan Password" id="password_users" disabled required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="col-sm-12">
                                <label for="">Confirm Password</label>
                                <input class="form-control" required type="password" name="password2" placeholder="Confirm Password" id="password2_users" onchange="validasipassword()" disabled required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label">Role</label>
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="radio" name="role_users" id="role_users" value="ADMIN" disabled>
                                            <span> Admin</span>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" name="role_users" id="role_users" value="TRAINER" disabled>
                                            <span> Trainer</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="radio" name="role_users" id="role_users" value="LINE MANAGER" disabled>
                                            <span> Line Manager</span>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" name="role_users" id="role_users" value="KARYAWAN" disabled>
                                            <span> Karyawan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label">Status</label>
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="radio" name="status" id="status_users" value="aktif" disabled>
                                            <span> Aktifkan</span>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" name="status" id="status_users" value="non-aktif" disabled>
                                            <span> Nonaktifkan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"> Cancel</button>
                <button type="submit" id="submit_user" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for create karyawan -->
<div class="modal fade bs-example-modal-lg-create_karyawan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <form action="<?= base_url('user/addKaryawan'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                    <div class="row">
                                        <div class=" form-group col-md-6">
                                            <div class="col-sm-12">
                                                <!-- <div>
                                                    <select required name="nip" class="form-control">
                                                        <option>-- Pilih NIP --</option>
                                                        <option >NIP</option>
                                                    </select>
                                                </div> -->
                                                <label for="">NIP</label>
                                                <div>
                                                    <input type="text" class="form-control" name="nip" placeholder="NIP" required autofocus>
                                                </div>
                                            </div>
                                        </div>

                                        <div class=" form-group col-md-6">
                                            <div class="col-sm-12">
                                                <label for="">Nama</label>
                                                <input name="nama" class="form-control" placeholder="Nama" type="text" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class=" form-group col-md-6">
                                            <div class="col-sm-12">
                                                <label for="">No. Handphone</label>
                                                <input class="form-control" placeholder="628xxxxx" name="telepon" type="number" required>
                                            </div>
                                        </div>

                                        <div class=" form-group col-md-6">
                                            <div class="col-sm-12">
                                                <label for="">Email</label>
                                                <input class="form-control" placeholder="Masukkan Email" name="email" type="text" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class=" form-group col-md-6">
                                            <div class="col-sm-12">
                                                <label class="">Department</label>
                                                <div>
                                                    <select class="form-control department-select2" name="department" style="width: 100%;">
                                                        <option value="0">-- Pilih Department --</option>
                                                        <?php
                                                        foreach ($departmentdata as $department) {
                                                            echo "
                                                        <option value='$department->code'>$department->department</option>
                                           ";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group col-md-12">
                                                <label class="control-label">Factory</label>
                                                <div>
                                                    <select class="form-control" name="location" required>
                                                        <option value="0">-- Pilih Factory --</option>
                                                        <option value="PC">PC</option>
                                                        <option value="PW">PW</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class=" form-group col-md-6">
                                            <div class="col-sm-12">
                                                <label for="">Line Manager</label>
                                                <div>
                                                    <select class="form-control linemanager-select2" name="linemanager" style="width: 100%;">
                                                        <option value="0">-- Pilih Line Manager --</option>
                                                        <?php
                                                        foreach ($linemanagerdata as $lmlist) {
                                                            echo "
                                                        <option value='$lmlist->nip'>$lmlist->nama - Line Manager</option>
                                           ";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" form-group col-md-6">
                                            <div class="col-sm-12">
                                                <label class="control-label">Apakah merupakan Line Manager?</label>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="radio" name="lm" id="" value="">
                                                            <span> Line Manager</span>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="radio" name="lm" id="" value="">
                                                            <span> Bukan Line Manager</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="col-md-12 col-12 col-lg-12 mt-2">
                                                <label>Foto Profil</label>
                                                <small class="form-text text-muted">Upload dengan format: png, jpg, jpeg <br> Dengan makimal ukuran/size: 2 MB</small>
                                                <input type="file" name="profile" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"> Cancel</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for Edit User -->
<div class="modal fade bs-example-modal-lg-edit_user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="head_users"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('user/edit'); ?>" method="POST">
                    <div class="row col-md-12">
                        <div class="form-group col-md-12">
                            <label class="control-label">Role</label>
                            <div>
                                <input class="form-control" name="id_users" type="hidden" id="e_id_users">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="radio" name="role" id="role_users1" value="ADMIN">
                                        <span> Admin</span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="radio" name="role" id="role_users1" value="TRAINER">
                                        <span> Trainer</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="radio" name="role" id="role_users1" value="LINEMANAGER">
                                        <span> Line Manager</span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="radio" name="role" id="role_users1" value="KARYAWAN">
                                        <span> Karyawan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="form-group col-md-12">
                            <label class="control-label">Status</label>
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="radio" name="status" id="status_users1" value="aktif">
                                        <span> Aktif</span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="radio" name="status" id="status_users1" value="non-aktif">
                                        <span> Non - Aktif</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"> Cancel</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for Edit Karyawan-->
<div class="modal fade bs-example-modal-lg-edit_karyawan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="edit_karyawan_title">Edit Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <form action="<?= base_url('user/editKaryawan'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                    <div class="row">
                                        <div class=" form-group col-md-6">
                                            <div class="col-sm-12">
                                                <label for="">NIP</label>
                                                <div>
                                                    <input type="text" class="form-control" name="nip" id="nip_karyawan" required autofocus readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class=" form-group col-md-6">
                                            <div class="col-sm-12">
                                                <label for="">Nama</label>
                                                <input name="nama" class="form-control" placeholder="Nama" type="text" id="nama_karyawan" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class=" form-group col-md-6">
                                            <div class="col-sm-12">
                                                <label for="">No. Handphone</label>
                                                <input class="form-control" placeholder="628xxxxx" name="telepon" type="number" id="telepon_karyawan" required>
                                            </div>
                                        </div>

                                        <div class=" form-group col-md-6">
                                            <div class="col-sm-12">
                                                <label for="">Email</label>
                                                <input class="form-control" placeholder="Masukkan Email" name="email" type="text" id="email_karyawan" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class=" form-group col-md-6">
                                            <div class="col-sm-12">
                                                <label class="">Department</label>
                                                <div>
                                                    <select class="form-control department-select2" name="department" id="department_karyawan" style="width: 100%;">
                                                        <option value="0">-- Pilih Department --</option>
                                                        <?php
                                                        foreach ($departmentdata as $department) {
                                                            echo "
                                                        <option value='$department->code'>$department->department</option>
                                           ";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group col-md-12">
                                                <label class="control-label">Factory</label>
                                                <div>
                                                    <select class="form-control" name="location" id="location_karyawan" required>
                                                        <option>-- Pilih Factory --</option>
                                                        <option>PC</option>
                                                        <option>PW</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class=" form-group col-md-6">
                                            <div class="col-sm-12">
                                                <label for="">Line Manager</label>
                                                <div>
                                                    <select class="form-control linemanager-select2" name="linemanager" id="linemanager_karyawan" style="width: 100%;">
                                                        <option value="0">-- Pilih Line Manager --</option>
                                                        <?php
                                                        foreach ($linemanagerdata as $lmlist) {
                                                            echo "
                                                        <option value='$lmlist->nip'>$lmlist->nama - Line Manager</option>
                                           ";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group col-md-12">
                                                <label class="control-label">Status</label>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="radio" name="status_karyawan" id="status_karyawan" value="aktif">
                                                            <span> Aktifkan</span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="radio" name="status_karyawan" id="status_karyawan" value="non-aktif">
                                                            <span> Nonaktifkan</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <span id="filesupload"></span>
                                            <div class="col-md-8">
                                                <label>Foto Profil</label>
                                                <small class="form-text text-muted">Upload dengan format: png, jpg, jpeg <br> Dengan makimal ukuran/size: 2 MB</small>
                                                <input type="file" name="profile" accept="image/*">
                                            </div>
                                            <!-- <button type="button" class="btn btn-info" id="tambah_upload">Tambah Upload</button> -->
                                            <p id="filenya_karyawan">defaultnya.jpg</p>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"> Cancel</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!---modal confirm import karyawan-->
<div class="modal fade bs-example-modal-import-karyawan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Import Data Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="m-b-30">
                            <form action="#" class="">
                                <small class="form-text text-left font-14 text-muted">Upload dengan format: xlsx,csv <br> Dengan makimal ukuran/size: 2 MB</small>
                                <input type="file" id="upload2" name="filenya" onChange="upload_file2(1)" id="userfile1" accept=".csv,.xlsx">
                            </form>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row --> 
            </div>        
                <div class="text-center m-t-5 mb-5">
                    <button type="button" class="btn btn-primary waves-effect waves-light">Import File</button>
                </div>            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!---modal confirm import user-->
<div class="modal fade bs-example-modal-import-user" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                            <form action="#" class="">
                                <small class="form-text text-left font-14 text-muted">Upload dengan format: xlsx,csv <br> Dengan makimal ukuran/size: 2 MB</small>
                                <input type="file" id="upload2" name="filenya" onChange="upload_file2(1)" id="userfile1" accept=".csv,.xlsx">
                            </form>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row --> 
            </div>        
                <div class="text-center m-t-5 mb-5">
                    <button type="button" class="btn btn-primary waves-effect waves-light">Import File</button>
                </div>            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->