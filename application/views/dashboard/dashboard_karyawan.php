<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-6 col-xl-12 text-center">
                <h4 class="text-left card-title">Selamat Datang, <?= ($this->session->userdata('nama')); ?> </h4>
                <img src="<?php echo base_url('assets/img/user/') . $this->session->userdata('photo'); ?>" width="200px" class="rounded-circle" height="200px">
                <h5 class="card-text mt-4"><?= $this->session->userdata('nama'); ?> - <?= $this->session->userdata('nip'); ?> - <?= $this->session->userdata('department'); ?>
                </h5>
                <p class="card-text mt-2">Learning Point</p>
            </div>
        </div>
        <h5 class="text-left">Mau Belajar Apa Hari ini? </h5>
        <div class="row">
            <div class="col-sm-6 col-xl-4 text-center">
                <div class="card border border-success" style="background-color: #00FF00;">
                    <!-- <a id="popoverOption" data-trigger="hover" rel="popover" data-placement="right"  href="" data-toggle="modal" data-target=".bs-example-modal-lg-training"> -->
                    <div class="card-body">
                        <a href="">
                            <!-- <img class="card-img-top mx-auto d-block img-fluid" style="width: 240px; height: 135px" src="assets/img/tmb.jpg" alt="thumbnail">                                   -->
                            <h5 class="card-title text-dark text-uppercase"><u>gENERAL-ALL</u></h5>
                            <!-- <div class="d-flex mb-2">
                                        <small class="text-muted" style="font-weight: 600">
                                            <span class="text-muted mr-3"><span class="mdi mdi-book-multiple mr-1"></span>3 Materi</span>
                                            <span class="text-muted mr-3"><span class="mdi mdi-clock mr-1"></span>1.5 Jam</span>
                                            <span class="text-muted"><span class="fas fa-user-friends mr-1"></span>30 Peserta</span>
                                        </small>
                                    </div> -->
                            <h5 class="card-text text-dark">Business Integrity</h5>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-4 text-center">
                <div class="card border border-success" style="background-color: #00FF00;">
                    <!-- <a id="popoverOption" data-trigger="hover" rel="popover" data-placement="right"  href="" data-toggle="modal" data-target=".bs-example-modal-lg-training"> -->
                    <div class="card-body">
                        <a href="">
                            <!-- <img class="card-img-top mx-auto d-block img-fluid" style="width: 240px; height: 135px" src="assets/img/tmb.jpg" alt="thumbnail">                                   -->
                            <h5 class="card-title text-dark text-uppercase"><u>Engineering</u></h5>
                            <!-- <div class="d-flex mb-2">
                                        <small class="text-muted" style="font-weight: 600">
                                            <span class="text-muted mr-3"><span class="mdi mdi-book-multiple mr-1"></span>3 Materi</span>
                                            <span class="text-muted mr-3"><span class="mdi mdi-clock mr-1"></span>1.5 Jam</span>
                                            <span class="text-muted"><span class="fas fa-user-friends mr-1"></span>30 Peserta</span>
                                        </small>
                                    </div> -->
                            <h5 class="card-text text-dark">Change Over Operator</h5>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-4 text-center">
                <div class="card border border-success" style="background-color: #00FF00;">
                    <!-- <a id="popoverOption" data-trigger="hover" rel="popover" data-placement="right"  href="" data-toggle="modal" data-target=".bs-example-modal-lg-training"> -->
                    <div class="card-body">
                        <a href="">
                            <!-- <img class="card-img-top mx-auto d-block img-fluid" style="width: 240px; height: 135px" src="assets/img/tmb.jpg" alt="thumbnail">                                   -->
                            <h5 class="card-title text-dark text-uppercase"><u></u></h5>
                            <!-- <div class="d-flex mb-2">
                                        <small class="text-muted" style="font-weight: 600">
                                            <span class="text-muted mr-3"><span class="mdi mdi-book-multiple mr-1"></span>3 Materi</span>
                                            <span class="text-muted mr-3"><span class="mdi mdi-clock mr-1"></span>1.5 Jam</span>
                                            <span class="text-muted"><span class="fas fa-user-friends mr-1"></span>30 Peserta</span>
                                        </small>
                                    </div> -->
                            <h5 class="card-text text-dark mb-2">Pencegahan dan Penanganan COVID-19</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="text-left card-title">Rungkut Active Learner </h5>
        <div class="row">
            <div class="col-sm-6 col-xl-4">
                <div class="card bg-light">
                    <img class="card-img-top mt-3 mx-auto d-block img-fluid" style="width: 100px; height: 135px" src="<?php echo base_url('assets/img/active/1.png'); ?>" alt="thumbnail">
                    <div class="card-body">
                        <h5 class="text-center tecard-title">Asus</h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-4">
                <div class="card bg-light">
                    <img class="card-img-top mt-3 mx-auto d-block img-fluid" style="width: 100px; height: 135px" src="<?php echo base_url('assets/img/active/2.png'); ?>" alt="thumbnail">
                    <div class="card-body">
                        <h5 class="text-center card-title">Dell</h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-4">
                <div class="card bg-light">
                    <img class="card-img-top mt-3 mx-auto d-block img-fluid" style="width: 100px; height: 135px" src="<?php echo base_url('assets/img/active/3.png'); ?>" alt="thumbnail">
                    <div class="card-body">
                        <h5 class="text-center card-title">Acer</h5>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="text-left card-title">Jelajahi Kebutuhan Belajarmu disini: </h5>
        <div class="row">
            <div class="col-sm-6 col-xl-3">
                <div class="card text-white bg-info border border-primary">
                    <a data-placement="right" href="<?php echo base_url('schedule_karyawan'); ?>">
                        <img class="card-img-top mt-3 mx-auto d-block img-fluid" style="width: 200px; height: 135px" src="assets/img/other/schedule.png" alt="thumbnail">
                        <div class="card-body mb-0">
                            <h5 class="text-center text-dark tecard-title">Kalender Training saya (Pre Test & Post Test)</h5>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card text-white bg-info border border-primary">
                    <a data-placement="right" href="">
                        <img class="card-img-top mt-3 mx-auto d-block img-fluid" style="width: 200px; height: 135px" src="assets/img/other/elearn.png" alt="thumbnail">
                        <div class="card-body mb-4">
                            <h5 class="text-center text-dark card-title">Belajar Online</h5>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card text-white bg-info border border-primary">
                    <a data-placement="right" href="<?php echo base_url('matrix_skill_karyawan'); ?>">
                        <img class="card-img-top mt-3 mx-auto d-block img-fluid" style="width: 200px; height: 135px" src="assets/img/other/skill.png" alt="thumbnail">
                        <div class="card-body mb-4">
                            <h5 class="text-center text-dark card-title">Skill Saya</h5>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card text-white bg-info border border-primary">
                    <a data-placement="right" href="<?php echo base_url('pelatihan'); ?>">
                        <img class="card-img-top mx-auto mt-3 d-block img-fluid" style="width: 200px; height: 135px" src="assets/img/other/learn.png" alt="thumbnail">
                        <div class="card-body mb-4">
                            <h5 class="text-center text-dark card-title">Rencana Belajar Saya</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end container-fluid -->
</div>
<!-- end wrapper -->