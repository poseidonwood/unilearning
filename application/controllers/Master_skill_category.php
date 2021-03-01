<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_skill_category extends CI_Controller {

    public function index()
    {        
        $this->template->load('layout', 'master/skill/skill_category');
    }
}