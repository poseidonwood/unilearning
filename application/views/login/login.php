<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Unilever Group</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="<?php echo base_url("assets/img/unileverlogoblue.png"); ?>">

    <link href="<?php echo base_url("assets/Admin/horizontal/assets/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("assets/Admin/horizontal/assets/css/metismenu.min.css"); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("assets/Admin/horizontal/assets/css/icons.css"); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("assets/Admin/horizontal/assets/css/style.css"); ?>" rel="stylesheet" type="text/css">

    <style>
        #numtel {
            position: fixed;
            left: 50%;
            top: 40%;
            transform: translate(-50%, -50%);
            display: block;
            opacity: 1;
        }

        #posisi {
            position: fixed;
            top: 0%;
        }
    </style>
</head>

<body onload="getLocation()">

    <div id="posisi" class="embed-responsive embed-responsive-16by9">
        <video muted autoplay loop playsinline>
            <source src="assets/video/vid3.mp4" type="video/mp4" />
            <source src="assets/video/vid2.mp4" type="video/mp4" />
            <source src="assets/video/vid1.mp4" type="video/mp4" />
            Browsermu tidak mendukung ini, upgrade donk!
        </video>
    </div>

    <!-- <iframe width="100%" height="200%" src="https://www.youtube.com/embed/7omGYwdcS04" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

    <div class="wrapper-page d-sm-block" id="numtel">
        <div class="card card-pages shadow-none">
            <div class="card-body">
                <div class="text-center m-t-0 m-b-15">
                    <img src="<?= base_url("assets/img/unileverlogoblue.png") ?>" class="thumb-lg mx-auto d-block img-fluid" alt="thumbnail">
                </div>
                <h5 class="font-18 text-center">Sign in to continue</h5>

                <?php
                if ($this->session->flashdata('error') == true) {

                    echo "

<div class='col-12'>
<div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
     <b>MAAF !!</b> " . $this->session->flashdata('error') . "
    </div>
</div>";
                }
                if ($this->session->flashdata('alert') == true) {

                    echo "
    
    <div class='col-12'>
    <div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
         <b></b> " . $this->session->flashdata('alert') . "
        </div>
    </div>";
                }
                ?>
                <form class="form-horizontal m-t-30" method="POST" action="login/validate">

                    <div class="form-group">
                        <div class="col-12">
                            <label>NIP</label>
                            <input class="form-control" type="text" required name="nip" autofocus placeholder="NIP">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" required placeholder="Password">
                        </div>
                    </div>
                    <input class="form-control" type="hidden" name="url" required value="<?= $this->input->get('continue'); ?>" readonly>
                    <input class="form-control" type="hidden" name="latitude" id="latitude" required readonly>
                    <input class="form-control" type="hidden" name="longitude" id="longitude" required readonly>

                    <!-- <div class="form-group">
                                <div class="col-12">
                                    <div class="checkbox checkbox-primary">
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1"> Remember me</label>
                                                  </div>
                                    </div>
                                </div>
                            </div> -->

                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group row m-t-30 m-b-0">
                        <div class="col-sm-12 text-right">
                            <a href="reset" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>

                        </div>

                        <!-- <div class="col-sm-5 text-right">
                                    <a href="register" class="text-muted">Create an account</a>
                                </div> -->
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="<?php echo base_url("assets/Admin/horizontal/assets/js/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/Admin/horizontal/assets/js/bootstrap.bundle.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/Admin/horizontal/assets/js/metismenu.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/Admin/horizontal/assets/js/jquery.slimscroll.js"); ?>"></script>
    <script src="<?php echo base_url("assets/Admin/horizontal/assets/js/waves.min.js"); ?>"></script>

    <!-- App js -->
    <script src="<?php echo base_url("assets/Admin/horizontal/assets/js/app.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/custom.js"); ?>"></script>

</body>

</html>