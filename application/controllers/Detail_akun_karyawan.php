<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_akun_karyawan extends CI_Controller {

    public function index()
    {        
        $this->template->load('layoutkaryawan', 'detail_akun/detail_akun');
    }
}