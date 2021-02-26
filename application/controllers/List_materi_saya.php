<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class List_materi_saya extends CI_Controller {

    public function index()
    {        
        $this->template->load('layouttrainer', 'list/list_materi_saya');
    }
}