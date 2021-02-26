<div class="wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">                       
                <!-- end row -->
            </div>
            <!-- end page-title -->

                <!-- START ROW -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8">                                 
                                    <div class="form-group row">                                                    
                                        <h4 class="mt-0 mb-4 header-title">Matrix Skill</h4>                                    
                                    </div>                                                    
                                </div>                                  
                                <div class="col-sm-4 text-right"> 
                                    <!-- <div class="form-group button-items btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg-create_user">                                      
                                            <span>
                                                <i class="fas fa-plus-circle"></i>
                                                <span>
                                                    Tambah
                                                </span>
                                            </span>
                                        </a>                                                
                                    </div> -->
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
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Department</th>                                                                                                                             
                                            <th class="text-center">Isi Matrix Skill</th>
                                            <th class="text-center">Preview</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1111</td>                                           
                                            <td>Andika</td>   
                                            <td>HR</td>                                                                                                                                                                                   
                                            <td class="text-center">      
                                                <span style="width:113px">                                                            
                                                    <a href="<?php  ?>" name="edit" class="btn btn-primary m-btn m-btn--icon btn-lg m-btn--icon-only" data-toggle="modal" data-target=".bs-example-modal-isi_matrixSkill">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                <span>                                                            
                                            </td>
                                            <td class="text-center">
                                                <span style="width:113px">                                                            
                                                    <a href="#" name="<?php ;?>" class="hapus btn btn-info m-btn m-btn--icon btn-lg m-btn--icon-only deletekar" kode="<?php ?>" data-toggle="modal" data-target=".bs-example-modal-preview_matrixSkill">
                                                        <i class="far fa-eye"></i>
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
        <!-- container-fluid -->

    </div>
    <!-- content -->
</div>      


<!--  Modal content for Isi Matrix Skill-->
<div class="modal fade bs-example-modal-isi_matrixSkill" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Isi Matrix Skill NIP - Nama</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                               
            <div class="row">
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Matrix Skill Tabel</h4>
                            <div class="table-responsive">
                                <table class="text-center table-bordered dt-responsive nowrap" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th width="10%" class="text-center">PD</th>
                                            <th width="10%" rowspan="2">Index</th>
                                            <th width="50%" rowspan="2">Deskripsi</th>
                                            <th width="30%" colspan="2" class="text-center">Example</th>                                                                                                    
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-user-secret"></i></th>
                                            <th class="text-center">Target</th>
                                            <th class="text-center">Aktual</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td rowspan="10" id="putar">Reactive</td>
                                            <td>1</td>
                                            <td>
                                                <input name="" class="form-control" required type="text" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td>                                                    
                                        </tr>           
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <input name="" class="form-control" required type="text" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>
                                                <input name="" class="form-control" required type="text" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>
                                                <input name="" class="form-control" required type="text" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>
                                                <input name="" class="form-control" required type="text" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>
                                                <input name="" class="form-control" required type="text" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>
                                                <input name="" class="form-control" required type="text" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>
                                                <input name="" class="form-control" required type="text" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>
                                                <input name="" class="form-control" required type="text" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>
                                                <input name="" class="form-control" required type="text" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td>
                                            <td>
                                                <input name="" class="form-control" required type="number" min="1" max="5" value="" id="" >
                                            </td> 
                                        </tr>                                                
                                        <tr>
                                            <td rowspan="10" id="putar">Preventive</td>                                                
                                            <td>11</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>14</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>16</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>17</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>18</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>19</td>
                                            <td></td>
                                            <td></td>
                                        </tr>  
                                        <tr>
                                            <td>20</td>
                                            <td></td>
                                            <td></td>
                                        </tr>          
                                        <tr>
                                            <td rowspan="10" id="putar">....</td>
                                            <td>21</td>
                                            <td></td>
                                            <td></td>
                                        </tr>  
                                        <tr>
                                            <td>22</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>23</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>24</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>25</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>26</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>27</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>28</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>29</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>30</td>
                                            <td></td>
                                            <td></td>
                                        </tr>                      
                                    </tbody>
                                </table>
                            </div>                                    
                        </div>
                    </div>
                </div>         

                <!-- <div class="col-xl-7">
                    <div class="card m-b-30">
                        <div class="card-body">                                
                            <h4 class="mt-0 header-title mb-4">Matrix Skill Chart</h4>
                          
                            <div id="matrix_skill" class="chart--container"></div>                            
                        </div>
                    </div>
                </div> -->

            </div>
            <!-- END ROW -->  
            </div>
            <div class="modal-footer">                                                            
                <button type="button" id="" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"> Cancel</button>                                                                                                                        
                <button type="button" id="" class="btn btn-primary">Simpan</button>                                                            
            </div>    
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for Preview Matrix Skill-->
<div class="modal fade bs-example-modal-preview_matrixSkill" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Preview NIP - Nama</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                               
            <div class="row">
                <div class="col-xl-5">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Matrix Skill Tabel</h4>
                            <div class="table-responsive">
                                <table class="text-center table-bordered dt-responsive nowrap" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">PD</th>
                                            <th rowspan="2">Index</th>
                                            <th rowspan="2">Deskripsi</th>
                                            <th colspan="2" class="text-center">Example</th>                                                                                                    
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-user-secret"></i></th>
                                            <th class="text-center">Target</th>
                                            <th class="text-center">Aktual</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td rowspan="10" id="putar">Reactive</td>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>                                                    
                                        </tr>           
                                        <tr>
                                            <td>2</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td></td>
                                            <td></td>
                                        </tr>                                                
                                        <tr>
                                            <td rowspan="10" id="putar">Preventive</td>                                                
                                            <td>11</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>14</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>16</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>17</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>18</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>19</td>
                                            <td></td>
                                            <td></td>
                                        </tr>  
                                        <tr>
                                            <td>20</td>
                                            <td></td>
                                            <td></td>
                                        </tr>          
                                        <tr>
                                            <td rowspan="10" id="putar">....</td>
                                            <td>21</td>
                                            <td></td>
                                            <td></td>
                                        </tr>  
                                        <tr>
                                            <td>22</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>23</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>24</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>25</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>26</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>27</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>28</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>29</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>30</td>
                                            <td></td>
                                            <td></td>
                                        </tr>                      
                                    </tbody>
                                </table>
                            </div>                                    
                        </div>
                    </div>
                </div>         

                <div class="col-xl-7">
                    <div class="card m-b-30">
                        <div class="card-body">                                
                            <h4 class="mt-0 header-title mb-4">Matrix Skill Chart</h4>
                          
                            <div id="matrix_skill" class="chart--container"></div>                            
                        </div>
                    </div>
                </div>

            </div>
            <!-- END ROW -->  
            </div>
            <div class="modal-footer">                                                            
                <button type="button" id="" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"> Cancel</button>                                                                                                                        
                <button type="button" id="" class="btn btn-primary">Simpan</button>                                                            
            </div>    
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->