<div class="wrapper">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid"> 
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <!-- <h4 class="page-title">Training</h4> -->
                    </div>                   
                </div>
                <!-- end row -->
            </div>
            
            <div class="row">
                <div class="col-12">                    
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group row">
                                        <h4 class="mt-0 header-title">List Materi Saya</h4>
                                    </div>                            
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-8"> 
                                    <!-- <div class="form-group row">                                                    
                                        <div class="col-sm-3">
                                            <label for="">Tanggal Awal</label>
                                            <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="">Tanggal Akhir</label>
                                            <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="mt-4">
                                                <a onclick="filter_table()" class="btn btn-info" href="javascript:void(0)">Filter</a>
                                            </div>                                                        
                                        </div>                                       
                                    </div>                                                     -->
                                </div>  
                                
                                <div class="col-sm-4 text-right mt-4"> 
                                    <!-- <div class="form-group button-items btn btn-success" id="tambah">
                                        <span>
                                            <i class="fas fa-plus-circle"></i>
                                            <span>
                                                Tambah
                                            </span>
                                        </span>
                                        </a>
                                    </div> -->
                                    <!-- <div class="form-group button-items btn btn-primary" id="import">
                                        <span>
                                            <i class="fas fa-file-import"></i>
                                            <span>
                                                Import
                                            </span>
                                        </span>
                                        </a>
                                    </div> -->
                                    <div class="btn-group mb-3">
                                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-download"></i>
                                            <span>
                                                Download
                                            </span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" target="_BLANK" href="#">PDF</a>
                                            <a class="dropdown-item" href="#">Excel</a>
                                        </div>
                                    </div>                                                                      
                                </div>
                            </div>  

                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th title="No">No</th>
                                            <th title="Nama">Nama Materi</th>                                            
                                            <th>Passing Grade</th>
                                            <th>Durasi Test</th>
                                            <th class="text-center">Deskripsi</th>
                                            <th class="text-center">File</th>
                                            <th class="text-center">Vidio</th>
                                            <th class="text-center" title="Edit">Edit</th>
                                            <th class="text-center" title="Delete">Delete</th>
                                        </tr>
                                    </thead>            
                                    <tbody>
                                        <tr>                                            
                                            <td>
                                                1
                                            </td>
                                            <td></td>
                                            <td></td>
                                            
                                            <td></td>
                                            <td class="text-center">
                                                <span class="mt-1 btn btn-info font-14 header-title" id="read_list_materi_saya"onclick="">read</span>
                                            </td>
                                            <td class="text-center">
                                                <span style="width:5%">
                                                    <span id="tampil_file_training_saya" class="btn btn-info m-btn m-btn--icon btn-lg m-btn--icon-only">
                                                        <i class="far fa-file-alt"></i>
                                                    </span>
                                                </span>
                                                
                                            </td>
                                            <td class="text-center">
                                                <span style="width:5%">
                                                    <span id="tampil_video_training_saya" class="btn btn-info m-btn m-btn--icon btn-lg m-btn--icon-only">
                                                        <i class="fas fa-video"></i>
                                                    </span>
                                                </span>                                                
                                            </td>
                                            <td class="text-center">      
                                                <span style="width:5%">
                                                    <span id="edit" class="btn btn-primary m-btn m-btn--icon btn-lg m-btn--icon-only">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </span>
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span style="width:5%">
                                                    <span class="hapus btn btn-danger m-btn m-btn--icon btn-lg m-btn--icon-only deletekar">
                                                        <i class="far fa-trash-alt"></i>                                                    
                                                    </span>
                                                </span>                                                                                                  
                                            </td>
                                        </tr>                                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">     
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                                <label for="">Department Name</label>
                                <input class="form-control" type="text" name="department_name" value="" id="">
                            </div>
                        </div>                    
                    </div> <!-- end col -->                            
                </div> <!-- end row -->                                              
            </div>
            <div class="modal-footer">                                                            
                <button type="button" id="" class="btn btn-danger" data-dismiss="modal" aria-label="Close"> Cancel</button>                                                                                                                        
                <button type="button" id="" class="btn btn-primary">Simpan</button>                                                            
            </div>    
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div> 
<!-- End Modal Tambah -->

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Edit Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('daftar_training_trainer/buatmateri'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label">Nama Materi</label>
                                <input class="form-control" required type="text" value="" name="judul" id="" required>
                                <input class="form-control" required type="hidden" value="" id="inimatericatid" required>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label">Durasi Test (Menit)</label>
                                <input class="form-control" required type="number" value="" id="" name="durasi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label">Passing Grade</label>
                                <input class="form-control" required type="text" value="" id="" name="passinggrade">
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label class="control-label">Deskripsi</label>
                                <textarea class="form-control" type="text" value="" id="" name="isi" id="" cols="30" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-sm-12">
                                <label class="control-label">Materi dan Soal</label>
                                <div class="form-group col-sm-12">
                                    <label>Upload File <small class="form-text text-muted">Upload hanya dengan format: pdf</small> </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="document" id="customFile" accept=".pdf">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Upload Vidio <small class="form-text text-muted">Upload dengan format mp4</small></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="video" id="customFile" accept=".mp4">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"> Cancel</button>
                <button type="submit" id="" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div> 
<!-- End Modal Edit -->

<!---modal confirm import-->
<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Import Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="m-b-30">
                            <form action="#" class="">
                                <small class="form-text text-left font-14 text-muted">Upload dengan format: xlsx,csv <br> Dengan makimal ukuran/size: 2 MB</small>
                                <input type="file" id="upload2" name="filenya" onChange="upload_file2(1)" id="userfile1" accept=".csv,.xlsx">
                            </form>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row --> 
            </div>        
                <div class="text-center m-t-5 mb-5">
                    <button type="button" class="btn btn-primary waves-effect waves-light">Import Files</button>
                </div>            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!---modal read-->
<div class="modal fade" id="modalread_list_materi_saya" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">Info Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!---modal tampil video-->
<div class="modal fade" id="modaltampil_video_training_saya" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="embed-responsive embed-responsive-16by9">
                <video controls loop playsinline>
                    <source src="assets/video/vid1.mp4" type="video/mp4" />
                    Browsermu tidak mendukung ini, upgrade donk!
                </video>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!---modal tampil file-->
<div class="modal fade" id="modaltampil_file_training_saya" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="embed-responsive embed-responsive-16by9">
                <embed type="application/pdf" src="assets/file/materi/materi1.pdf" width="100%" height="720px"></embed>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->