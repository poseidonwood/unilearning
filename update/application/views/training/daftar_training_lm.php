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
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                if (is_array($datacategory) || is_object($datacategory)) {
                    $nonyaini = 1;
                    foreach ($datacategory as $category) {
                ?>
                        <div class="col-sm-6 col-xl-3">
                            <div class="card border border-primary">
                                <div class="card-body">
                                    <a id="" data-trigger="hover" rel="popover" data-placement="right" href="#" onclick="ajukanModal('<?= $category->id; ?>','<?= $category->nama; ?>')">
                                        <img class=" card-img-top mx-auto d-block img-fluid" style="width: 240px; height: 135px" src="<?= base_url('assets/img/uploads/') . $category->foto; ?>" alt="thumbnail">
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
                                                        $countpeople =  $this->db->count_all_results('users_materi_category');
                                                        echo $countpeople . " Member";
                                                        ?></span>
                                                </small>
                                            </div>
                                            <p class="card-text"><?= $category->deskripsi; ?></p>
                                        </div>
                                    </a>
                                    <div class="text-right">
                                        <span class="btn btn-primary" onclick="ajukanModal('<?= $category->id; ?>')">Ajukan Training</span>
                                        <!-- <span class="btn btn-primary" onclick="tambahMateri('<?= $category->id; ?>')">Tambah Materi</span> -->
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
                    <?php
                    }
                } else { ?>
                    <div class="col-sm-6 col-xl-3 text-center">
                        <div class="card border border-primary">
                            <div class="card-body">
                                <h5 class="card-title">Trainer belum membuat category materi</h5>
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

<!---modal ajukan-->
<div class="modal fade bs-example-modal-ajukan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">Ajukan Training</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-11">
                        <div class="form-group col-md-12">
                            <label class="control-label">Nama Karyawan</label>
                            <div>
                                <input type="hidden" name="categoryid" id="categoryid" required>
                                <input type="hidden" name="namecategoryid" id="namecategoryid" required>

                                <select class="form-control js-example-basic-single" id="nm_karyawan_select2" name="nm_karyawan" style="width: 100%;">
                                    <option value="0">-- Pilih Nama Karyawan --</option>
                                    <?php
                                    foreach ($userdata as $user) {
                                        echo "
                                                        <option value='$user->nip'>($user->nip)- $user->nama ($user->department) - $user->role</option>
                                           ";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="p-1">
                            <div class="mt-4">
                                <a onclick="kirimAjukan()" class="btn btn-info" href="javascript:void(0)"><i class="fas fa-paper-plane"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" id="" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"> Cancel</button>
                <button type="button" id="" class="btn btn-primary">Simpan</button> -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for create -->
<div class="modal fade bs-example-modal-lg-create" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah Training</h5>
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
                                        <div class="form-group col-md-12">
                                            <div class="col-sm-12">
                                                <label for="">Nama Training</label>
                                                <input class="form-control" required type="text" value="" id="" placeholder="Masukkan Nama Training">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <form action="" class="form_horizontal" id="images" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                <span id="filesupload"></span>
                                                <div class="col-md-12 col-12 col-lg-12 mt-2">
                                                    <label>Foto / Gambar Training</label>
                                                    <small class="form-text text-muted">Upload dengan format: png, jpg, jpeg, atau pdf <br> Dengan makimal ukuran/size: 2 MB</small>
                                                    <input type="file" name="userfile1" onChange="upload_file2(1)" id="userfile1" accept="image/*,.pdf,.docx,.xlsx,.xls,.csv">
                                                    <input type="hidden" name="fileupload[]" id="fileupload1">
                                                </div>
                                                <span class="addinput"></span>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group col-md-12">
                                            <div class="col-sm-12">
                                                <label for="">Deskripsi Training</label>
                                                <textarea class="form-control" name="" id="" cols="30" rows="6"></textarea>
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
                <button type="button" id="" class="btn btn-primary">Simpan</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama Materi</th>
                                    <th class="text-center">Nama Trainer</th>
                                    <th class="text-center">Passing Grade</th>
                                    <th class="text-center">Durasi Test</th>
                                    <th class="text-center">Deskripsi</th>
                                    <!-- <th class="text-center">Edit</th>                                
                                    <th class="text-center">Hapus</th>                                 -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">ERGONOMI</td>
                                    <td class="text-center">ULI LEARNING FACILITATOR</td>
                                    <td class="text-center">70</td>
                                    <td class="text-center">00:30:00</td>
                                    <td class="text-center"><span class="btn btn-info font-14 header-title" data-toggle="modal" data-target=".bs-example-modal-center-read">read</span></td>
                                </tr>
                            </tbody>
                        </table>
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
                <p>Materi ini berisi tentang bagimana business integrity di Unilever itu dijaga</p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->