<div class="wrapper">
    <div class="content">
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-animation="true" data-delay="5000" data-autohide="false">
                <div class="toast-header">
                    <span class="fas fa-clock" style="width: 15px;height: 15px"></span>

                    <strong class="mr-auto">Timer</strong>
                    <!-- <small>1 menit yang lalu</small> -->
                    <!-- <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="toast-body" id="timernya">
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="page-title-box">
            </div>
            <!-- <span class="badge badge-pill badge-success">
                <h4 id="timernya"></h4>
            </span> -->
            <div class="row" id="row3" <?php
                                        if ($cekmateripotition !== "pretest") {
                                            echo "style='display:none'";
                                        } else {
                                            echo "style='display:block'";
                                        }
                                        ?>>
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h5 class="card-title">Pre Test</h5>
                            <hr>
                            <table style="margin-left: 0%; width: 100%">
                                <?php
                                $no = 1;
                                foreach ($datasoalpretest as $soallist) {
                                    $randomqueue = rand(1, 1000);
                                    $soalnya = $soallist['question'];
                                    $id = $soallist['id'];
                                    $this->db->where('id', $id);
                                    $this->db->update('materi_soal', array('queue' => $randomqueue));
                                    $option = $soallist['answer_option'];
                                    $opsi_jawaban = explode(',', $option);
                                    $noinduk = $no++;
                                ?>
                                    <tr>
                                        <td style="width: 10%" class="text-center"><?= $noinduk; ?></td>
                                        <td style="width: 90%" class="text-left" colspan="2"> <?= $soalnya; ?></td>
                                    </tr>
                                    <?php
                                    $no1 = 1;
                                    foreach ($opsi_jawaban as $pilihan) {
                                        $nonya = $no1++;
                                    ?>
                                        <tr>
                                            <td></td>
                                            <td style='width: 5%' class='text-center'><input type='radio' name='pilihan<?= $noinduk; ?>' value=' <?= $id . "," . $pilihan; ?>'></td>
                                            <td style='width: 95%' class='text-left'><?= $pilihan; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                                <input type="hidden" id="materi_id" value="<?= $materi_id; ?>"><br>

                            </table>
                            <button type="button" onclick="prosesPretest()" class="btn btn-primary">Next Step</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row hidden1" id="row1" <?php
                                                if ($cekmateripotition !== "materi") {
                                                    echo "style='display:none'";
                                                } else {
                                                    echo "style='display:block'";
                                                }
                                                ?>>
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#contentnya" role="tab">
                                        <span class="d-none d-md-block">Materi</span><span class="d-block d-md-none"><i class="mdi mdi-file h5"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#home" role="tab">
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
                                <div class="tab-pane active p-3" id="contentnya" role="tabpanel">
                                    <p>
                                        <?php
                                        if ($materidata->isi == null) {
                                            echo "<pre>Materi Text tidak tersedia , lanjut ke materi file dan video</pre>";
                                        } else {
                                            echo $materidata->isi;
                                        }
                                        ?>
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="home" role="tabpanel">
                                    <?php
                                    if ($materidata->document == null) {
                                        echo "<pre>Materi Document tidak tersedia , lanjut ke materi text dan video</pre>";
                                    } else {
                                    ?>

                                        <embed type="application/pdf" src="<?= base_url('assets/file/materi/') . $materidata->document; ?>" width="100%" height="720px"></embed>
                                        <object data="<?= base_url('assets/file/materi/') . $materidata->document; ?>" type="application/pdf"></object>
                                        <iframe src="<?= base_url('assets/file/materi/') . $materidata->document; ?>" frameborder="0"></iframe>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="tab-pane p-3" id="profile" role="tabpanel">
                                    <?php
                                    if ($materidata->video == null) {
                                        echo "<pre>Materi Document tidak tersedia , lanjut ke materi text dan video</pre>";
                                    } else {
                                    ?>
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <video controls loop playsinline>
                                                <source src="<?= base_url('assets/file/materi/') . $materidata->video; ?>" type="video/mp4" />
                                                Browsermu tidak mendukung ini, upgrade donk!
                                            </video>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <button type="button" onclick="prosesMateri()" class="btn btn-primary">Next Step</button>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="row2" <?php
                                        if ($cekmateripotition !== "posttest") {
                                            echo "style='display:none'";
                                        } else {
                                            echo "style='display:block'";
                                        }
                                        ?>>
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h5 class="card-title">Post Test</h5>
                            <hr>
                            <table style="margin-left: 0%; width: 100%">
                                <?php
                                $nopost = 1;
                                foreach ($datasoalposttest as $soallist1) {
                                    $randomqueue1 = rand(1, 1000);
                                    $soalnya1 = $soallist1['question'];
                                    $id1 = $soallist1['id'];
                                    $this->db->where('id', $id);
                                    $this->db->update('materi_soal', array('queue' => $randomqueue1));
                                    $option1 = $soallist1['answer_option'];
                                    $opsi_jawaban1 = explode(',', $option1);
                                    $noinduk1 = $nopost++;
                                ?>
                                    <tr>
                                        <td style="width: 10%" class="text-center"><?= $noinduk1; ?></td>
                                        <td style="width: 90%" class="text-left" colspan="2"> <?= $soalnya1; ?></td>
                                    </tr>
                                    <?php
                                    $no11 = 1;
                                    foreach ($opsi_jawaban1 as $pilihan1) {
                                        $nonya1 = $no11++;
                                    ?>
                                        <tr>
                                            <td></td>
                                            <td style='width: 5%' class='text-center'><input type='radio' name='pilihanpost<?= $noinduk1; ?>' value=' <?= $id1 . "," . $pilihan1; ?>'></td>
                                            <td style='width: 95%' class='text-left'><?= $pilihan1; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <!-- <input type="text" id="jawaban<?= $id; ?>" value="<?= $id; ?>"><br> -->
                                <?php
                                }
                                ?>
                            </table>
                            <button type="button" onclick="prosesPosttest()" class="btn btn-primary">Next Step</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->
</div>