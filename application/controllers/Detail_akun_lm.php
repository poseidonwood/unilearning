<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_akun_lm extends CI_Controller {

    public function index()
    {        
        $this->template->load('layoutlm', 'detail_akun/detail_akun');
    }
}