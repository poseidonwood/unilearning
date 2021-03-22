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
  public function log($value = null)
  {
    $url1 = current_url();
    $sec = "5";
    $content = "content='$sec;URL='$url1'";
    if ($value == null || $value == "") {
      $select = $this->MData->selectdataglobal2log('logger');
      // Cek value 
      if (is_array($select) || is_object($select)) {
        foreach ($select as $logger) {
          $datalog = $logger->logger;
          $datanya[] = $datalog . "<br>";
        }
      } else {
        echo json_encode(array('result' => 'false', 'message' => 'data unknown'));
      }

      echo "
      <html>
          <head>
          <meta http-equiv='refresh' " . $content . ">
          </head>
          <body>
         " . implode("", $datanya) . "
          </body>
      </html>";
    } else {
      $select = $this->MData->selectdata('logger', array('level' => $value));
      // Cek value 
      if (is_array($select) || is_object($select)) {
        foreach ($select as $logger) {
          $datalog = $logger->logger;
          echo json_encode($datalog);
        }
      } else {
        echo json_encode(array('result' => 'false', 'message' => 'data unknown'));
      }
    }

    // header("Refresh: 5; URL=$url1");
  }
}
