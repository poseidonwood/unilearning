<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_page extends CI_Controller {

    public function index()
    {        
        $this->load->view('errors/error_page');
    }
}