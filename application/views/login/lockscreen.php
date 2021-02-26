
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
                        
    
                        <form class="form-horizontal m-t-30" action="dashboard">    
                            <div class="user-thumb text-center m-b-30">
                                <img src="<?= base_url("assets/img/unileverlogoblue.png");?>" class="thumb-lg mx-auto d-block img-fluid" alt="thumbnail">
                            </div>

                            <h5 class="font-18 text-center">Lockscreen</h5>
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Password</label>
                                    <input class="form-control" type="password" required="" placeholder="Password">
                                </div>
                            </div>
    
                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>
    
                            <div class="form-group mb-0 row">
                                <div class="col-12 m-t-10 text-center">
                                    <a href="login" class="text-muted">Not you?</a>
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