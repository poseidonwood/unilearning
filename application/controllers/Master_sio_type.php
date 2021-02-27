<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_sio_type extends CI_Controller {

    public function index()
    {        
        $this->template->load('layout', 'master/sio_type');
    }
}