<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Matrix_skill_karyawan extends CI_Controller {

    public function index()
    {        
        $this->template->load('layoutkaryawan', 'matrix_skill/matrix_skill_karyawan');
    }
}