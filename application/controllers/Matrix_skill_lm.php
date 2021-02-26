<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Matrix_skill_lm extends CI_Controller {

    public function index()
    {        
        $this->template->load('layoutlm', 'matrix_skill/matrix_skill_lm');
    }
}