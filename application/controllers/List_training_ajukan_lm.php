<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class List_training_ajukan_lm extends CI_Controller {

    public function index()
    {        
        $this->template->load('layoutlm', 'list/list_training_ajukan_lm');
    }
}