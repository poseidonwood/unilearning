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
                                    <h4 class="mt-0 header-title">List Training yang Saya diajukan</h4>                                    
                                </div>                                                    
                            </div>  
                            <!-- <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button> -->
                            <div class="col-sm-4 text-right">                                 
                                <a href="#" target="_BLANK">
                                    <div class="form-group button-items btn btn-warning">
                                    <!-- <a class="btn btn-info" href="quotation/create" role="button"> -->
                                        <span>
                                            <i class="fas fa-download"></i>
                                            <span>
                                                Download
                                            </span>
                                        </span>                                    
                                    </div>                                       
                                </a>                                                
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>                                        
                                        <th>Nama Training</th>
                                        <th>NIP</th>
                                        <th>Nama Karyawan</th>                                        
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>GENERAL-ALL</td>   
                                        <td>223242342342</td>  
                                        <td>Andi</td>                                  
                                        <td class="text-center">
                                            <span style="width:113px">                                                            
                                                <a href="#" name="<?php ;?>" class="hapus btn btn-danger m-btn m-btn--icon btn-lg m-btn--icon-only deletekar" kode="<?php ?>" data-toggle="modal" data-target=".bs-example-modal-center-delete">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </span>                                                                                                  
                                        </td>
                                    </tr>                            
                                </body>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!---modal confirm delete-->
<div class="modal fade bs-example-modal-center-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                            
                <!-- <input type="hidden" name="idhapus" id="idhapus"> -->
                <p>Apakah anda yakin ingin menghapus <strong class="text-konfirmasi"> </strong> ?</p>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->