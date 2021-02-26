<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_akun_trainer extends CI_Controller {

    public function index()
    {        
        $this->template->load('layouttrainer', 'detail_akun/detail_akun');
    }
}