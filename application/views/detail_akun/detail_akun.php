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
                            <div class="col-sm-2">  
                                <h4 class="mt-0 header-title">Profile Account</h4> 
                                <p></p>                                                                            
                            </div>                          
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="user-thumb text-center m-t-30">                                    
                                    <?php $row = 1; if($row == '') { ?>
                                        <img src="<?php echo base_url('assets/img/user/'.$row->image);?>" width="200px" height="200px">
                                        <?php }else{ ?>
                                            <img src="<?php echo base_url('assets/img/user/defaultuser.png');?>" width="200px" height="200px">
                                        <?php } ?> 
                                </div>
                            </div>
                            <div class="col-md-9">
                                <table class="table table-bordered dt-responsive nowrap" style="margin-left: 0%; border-collapse: collapse; border-spacing: 0; width: 100%;">                            
                                    <tbody>
                                        <tr>
                                            <td width="30%" class="mt-0 header-title">Employee ID</td>
                                            <td width="70%">11111</td>                                    
                                        </tr>
                                        <tr>
                                            <td class="mt-0 header-title">Employee Name</td>
                                            <td>AA</td>
                                        </tr>                                
                                        <tr>
                                            <td class="mt-0 header-title">department</td>
                                            <td>ENG SUIT-PC</td>
                                        </tr>
                                        <tr>
                                            <td class="mt-0 header-title">Factory</td>
                                            <td>PC</td>
                                        </tr>
                                        <tr>
                                            <td class="mt-0 header-title">role</td> 
                                            <td>Admin</td>                                                             
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                            <span style="width:10%; margin-left:27%">                                                            
                                <a href="<?php  ?>" name="edit" class="btn btn-primary m-btn m-btn--icon btn-lg m-btn--icon-only" data-toggle="modal" data-target=".bs-example-modal-lg-edit-profil">
                                    <i class="fas fa-pencil-alt"></i> Ubah Profile
                                </a>
                            </span>                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                                        
<!--  Modal content for edit  -->
<div class="modal fade bs-example-modal-lg-edit-profil" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">                                                                                                                                                               
                                <div class="text-right row form-group">                                                                    
                                    <div class="col-sm-12">                                        
                                        <button type="button" id="" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg-ubah_password"> Change Password</button>                                                                                                                        
                                    </div>
                                </div>                            

                                <div class="row form-group col-md-12">                                                                    
                                    <div class="col-sm-12">
                                        <label for="">No. Handphone</label>
                                        <input class="form-control" type="number" value="" id="" >
                                    </div>
                                </div>

                                <div class="row form-group col-md-12">                                                                    
                                    <div class="col-sm-12">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control form-control-success" id="inputHorizontalSuccess">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <form action="" class="form_horizontal" id="images" enctype="multipart/form-data" method="post" accept-charset="utf-8">                        
                                            <span id="filesupload"></span>
                                            <div class="col-md-12 col-12 col-lg-12 mt-2">  
                                                <label>Foto Profil</label>
                                                <small class="form-text text-muted">Upload dengan format: png, jpg, jpeg, atau pdf <br> Dengan makimal ukuran/size: 2 MB</small>
                                                <input type="file" name="userfile1" onChange="upload_file2(1)" id="userfile1" accept="image/*,.pdf,.docx,.xlsx,.xls,.csv">
                                                <input type="hidden" name="fileupload[]" id="fileupload1">
                                            </div>
                                            <span class="addinput"></span>
                                        </form>                
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

<!--  Modal content for edit  -->
<div class="modal fade bs-example-modal-lg-ubah_password" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">                                                                                                                                                                                               
                                <div class="row form-group col-md-12">                                                                    
                                    <div class="col-sm-12">
                                        <label for=""> New Password</label>
                                        <input class="form-control" type="password" value="" id="" >
                                    </div>
                                </div> 
                                
                                <div class="row form-group col-md-12">                                                                    
                                    <div class="col-sm-12">
                                        <label for=""> Confirm Password</label>
                                        <input class="form-control" type="password" value="" id="" >
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