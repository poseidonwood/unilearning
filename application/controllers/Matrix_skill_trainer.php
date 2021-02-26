<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Matrix_skill_trainer extends CI_Controller {

    public function index()
    {        
        $this->template->load('layouttrainer', 'matrix_skill/matrix_skill_trainer');
    }
}