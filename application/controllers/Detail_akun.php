<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_akun extends CI_Controller {

    public function index()
    {        
        $this->template->load('layout', 'detail_akun/detail_akun');
    }
}