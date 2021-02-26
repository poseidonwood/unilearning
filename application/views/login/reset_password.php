
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
                            <img src="<?= base_url("assets/img/unileverlogoblue.png")?>" class="thumb-lg mx-auto d-block img-fluid" alt="thumbnail">
                        </div>
                        <h5 class="font-18 text-center">Reset Password</h5>
    
                        <form class="form-horizontal m-t-30" method="post" action="<?=base_url('reset/proses');?>">

                             <?php
                                if($this->session->flashdata('alert')==!true){
                                    echo "<div class='col-12'>
                                    <div class='alert alert-danger alert-dismissible'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                            Enter your <b>Email</b> and instructions will be sent to you!
                                    </div>
                               </div>";
                                }else{
                                    echo "<div class='col-12'>
                                    <div class='alert alert-success alert-dismissible'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                           ".$this->session->flashdata('alert')."
                                    </div>
                               </div>";
                                }                                
                            ?>

                                <div class="form-group">
                                        <div class="col-12">
                                                <label>Email</label>
                                            <input class="form-control" type="email" required="" autofocus name="email" placeholder="Email">
                                        </div>
                                    </div>
    
                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Send Email</button>
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