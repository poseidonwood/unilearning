<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_karyawan extends CI_Controller {

    public function index()
    {        
        $this->template->load('layoutkaryawan', 'schedule/schedule_karyawan');
    }
}