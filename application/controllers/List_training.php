<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class List_training extends CI_Controller {

    public function index()
    {        
        $this->template->load('layout', 'list/list_training');
    }
}