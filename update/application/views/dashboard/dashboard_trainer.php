<div class="wrapper">
    <div class="row">
        <div class="col-xl-12">
            <div id="carouselExampleCaption" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="assets/img/Slider1.jpg" style="width:1340px;height:200px;" alt="..." class="d-block img-fluid mx-auto">
                        <div class="carousel-caption d-none d-md-block">
                            <h4></h4>
                            <p></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/Slider2.jpg" width="1340" height="200" alt="..." class="d-block img-fluid mx-auto">
                        <div class="carousel-caption d-none d-md-block">
                            <h4></h4>
                            <p></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/Slider3.jpg" width="100%" height="100%" alt="..." class="d-block img-fluid mx-auto">
                        <div class="carousel-caption d-none d-md-block">
                            <h4></h4>
                            <p></p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div> <!-- end col -->
    </div> <!-- end row -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card bg-transparent m-b-30">
                            <div class="card-body text-left">
                                <h4 class="mt-0 header-title mb-3">Daftar Training</h4>

                                <div class="row">
                                    <?php
                                    if (is_array($datacategory) || is_object($datacategory)) {
                                        $nonyaini = 1;
                                        foreach ($datacategory as $category) {
                                    ?>
                                            <div class="col-sm-6 col-xl-3">
                                                <div class="card border border-primary">
                                                    <div class="card-body">
                                                        <a id="" data-trigger="hover" rel="popover" data-placement="right" href="<?= base_url('daftar_training_trainer'); ?>">
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

                                <div class="row">
                                    <div class="col-xl-12 text-center">
                                        <hr style="height:1px;border-width:0;color:gray;background-color:gray;width:60%;text-align:left;margin-left:20%">
                                        <a href="training">
                                            <h6>More Training</h6>
                                        </a>
                                        <hr style="height:1px;border-width:0;color:gray;background-color:gray;width:60%;text-align:left;margin-left:20%">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- START ROW -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Training Terkini</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Training</th>
                                                <th scope="col">Area</th>
                                                <th scope="col">Fungsi</th>
                                                <th scope="col">Pemateri</th>
                                                <th scope="col">Jumlah Peserta</th>
                                                <th scope="col">Ruang Training</th>
                                                <th scope="col">Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1-5</td>
                                                <td>Ilmu Expert</td>
                                                <td>Lapangan</td>
                                                <td>Pembelajaran berkelanjutan</td>
                                                <td>Andi S</td>
                                                <td>30</td>
                                                <td>Ruang A</td>
                                                <td>21/01/2021 10:45:00 </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="schedule_trainer" class="btn btn-info">Details <span class="ti-angle-double-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END ROW -->

            </div>
            <!-- container-fluid -->

        </div>
        <!-- content -->

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->