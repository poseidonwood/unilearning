<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_trainer extends CI_Controller {

    public function index()
    {        
        $this->template->load('layouttrainer', 'schedule/schedule_trainer');
    }
}