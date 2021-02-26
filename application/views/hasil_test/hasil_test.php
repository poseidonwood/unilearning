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
                            <div class="col-sm-8">
                                <div class="form-group row">
                                    <h4 class="mt-0 header-title">Hasil Test</h4>
                                </div>
                            </div>
                            <!-- <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button> -->
                            <!-- <div class="col-sm-4 text-right"> 
                                <div class="button-items btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg-create">                                   
                                        <span>
                                            <i class="fas fa-plus-circle"></i>
                                            <span>
                                                Tambah
                                            </span>
                                        </span>
                                    </a>                                                
                                </div>
                                <div class="button-items btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-lg-create">                                   
                                        <span>
                                            <i class="fas fa-download"></i>
                                            <span>
                                                Download
                                            </span>
                                        </span>
                                    </a>                                                
                                </div>                                       
                            </div> -->
                        </div>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Status</th>
                                    <th>Kategori</th>
                                    <th>Materi</th>
                                    <th>Pre Test %</th>
                                    <th>Post Test %</th>
                                    <th>Passing Grade</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Piagam</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if (is_array($datatest) || is_object($datatest)) {
                                    foreach ($datatest as $hasil_test) {

                                ?>

                                        <!-- id
                                    materi_id
                                    nip
                                    nama
                                    materi_potition
                                    start_test
                                    end_test
                                    expired_test
                                    result
                                    pretest
                                    posttest
                                    passinggrade
                                    update_at -->
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <?php
                                                if ($hasil_test->result == "LULUS") {
                                                    echo '<span class="font-14 badge badge-success">Lulus</span>';
                                                } else if ($hasil_test->result == "TIDAK LULUS") {
                                                    echo '<span class="font-14 badge badge-danger">Tidak Lulus</span>';
                                                } else {
                                                    echo '<span class="font-14 badge badge-danger">On Going</span>';
                                                }
                                                ?>
                                            </td>
                                            <?php
                                            $this->db->select('*');
                                            $this->db->from('materi_category');
                                            $this->db->where(array('id' => $hasil_test->materi_cat_id));
                                            $categori = $this->db->get()->row()->nama;
                                            $this->db->select('*');
                                            $this->db->from('materi');
                                            $this->db->where(array('id' => $hasil_test->materi_id));
                                            $nama_materi = $this->db->get()->row()->judul;
                                            echo " <td>$categori</td>";
                                            echo " <td>$nama_materi</td>";
                                            ?>
                                            <td><?= $hasil_test->pretest; ?></td>
                                            <td><?= $hasil_test->posttest; ?></td>
                                            <td><?= $hasil_test->passinggrade; ?></td>
                                            <td><?= $hasil_test->start_test; ?></td>
                                            <td><?= $hasil_test->end_test; ?></td>
                                            <td class="text-center">
                                                <span style="width:113px">
                                                    <a href="<?php  ?>" name="file" class="btn btn-info m-btn m-btn--icon btn-lg m-btn--icon-only" data-toggle="modal" data-target=".bs-example-modal-sm-file">
                                                        <i class="mdi mdi-file-document"></i>
                                                    </a>
                                                    <span>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>