<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_lm extends CI_Controller {

    public function index()
    {        
        $this->template->load('layoutlm', 'schedule/schedule_lm');
    }
}