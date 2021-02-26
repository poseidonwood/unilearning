<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_pages_all extends CI_Controller {

    public function index()
    {        
        $this->load->view('errors/error_pages_all');
    }
}