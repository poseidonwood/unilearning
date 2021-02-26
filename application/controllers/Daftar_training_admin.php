<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_training_admin extends CI_Controller {

    public function index()
    {        
        $this->template->load('layout', 'training/daftar_training_admin');
    }   
}