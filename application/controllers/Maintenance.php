<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maintenance extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('user_agent');
    //load model login (model login isinya validasi session , dan cek login proses)
    $this->load->model('MData');
    $this->load->model('MLogin');
    $this->load->helper('file');
  }
  public function index()
  {
    $this->load->view('errors/maintenance');
  }
  public function switch($value = null)
  {
    if ($value == null || $value == "") {
      echo json_encode(array('result' => 'false', 'message' => 'value null'));
    } else {
      $select = $this->MData->selectdatawhere('maintenance', array('id' => '1'));
      // Cek value 
      if ($select->status == $value) {
        echo json_encode(array('result' => 'false', 'message' => 'value same with status'));
      } else {
        $data = array(
          'status' => $value
        );
        $update = $this->MData->edit(array('id' => '1'), 'maintenance', $data);
        if ($update == true) {
          echo json_encode(array('result' => 'true', 'message' => 'success'));
        } else {
          echo json_encode(array('result' => 'false', 'message' => 'fail'));
        }
      }
    }
  }
}
