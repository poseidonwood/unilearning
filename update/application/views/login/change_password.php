
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Unilever Group</title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url("assets/img/unileverlogoblue.png");?>">

        <link href="<?php echo base_url("assets/Admin/horizontal/assets/css/bootstrap.min.css");?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url("assets/Admin/horizontal/assets/css/metismenu.min.css");?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url("assets/Admin/horizontal/assets/css/icons.css");?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url("assets/Admin/horizontal/assets/css/style.css");?>" rel="stylesheet" type="text/css">

    </head>

    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
        
        <div class="wrapper-page">
                <div class="card card-pages shadow-none">
    
                    <div class="card-body">
                        <div class="text-center m-t-0 m-b-15">
                            <img src="<?= base_url("assets/img/unileverlogoblue.png");?>" class="thumb-lg mx-auto d-block img-fluid" alt="thumbnail">
                        </div>

                        <h5 class="font-18 text-center">Change Password</h5>
                        <?php
                                if($this->session->flashdata('alert')==true){
                                    echo "<div class='col-12'>
                                    <div class='alert alert-danger alert-dismissible'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                           ".$this->session->flashdata('alert')."
                                    </div>
                               </div>";
                                }                              
                            ?>

                        <form class="form-horizontal m-t-30" method="POST" action="<?=base_url('change_password/proses');?>">                              
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Password</label>
                                    <input class="form-control" type="password" name="password1" required="" autofocus placeholder="Masukkan Password Baru">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-12">
                                        <label>Confirm Password</label>
                                    <input class="form-control" type="password" required="" name="password2" placeholder="Konfirmasi Password Baru Anda">
                                </div>
                            </div>         
                           <input class="form-control" type="hidden" required="" name="id" value="<?php  echo $id;?>">
                           <input class="form-control" type="hidden" required="" name="token" value="<?php  echo $token;?>">

                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Submit</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
    
                </div>
            </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="<?php echo base_url("assets/Admin/horizontal/assets/js/jquery.min.js");?>"></script>
        <script src="<?php echo base_url("assets/Admin/horizontal/assets/js/bootstrap.bundle.min.js");?>"></script>
        <script src="<?php echo base_url("assets/Admin/horizontal/assets/js/metismenu.min.js");?>"></script>
        <script src="<?php echo base_url("assets/Admin/horizontal/assets/js/jquery.slimscroll.js");?>"></script>
        <script src="<?php echo base_url("assets/Admin/horizontal/assets/js/waves.min.js");?>"></script>

        <!-- App js -->
        <script src="<?php echo base_url("assets/Admin/horizontal/assets/js/app.js");?>"></script>
        
    </body>

</html>