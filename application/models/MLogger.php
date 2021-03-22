<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MLogger extends CI_Model
{


  function logger_error($message)
  {
    $statuslog = 'ERROR';
    $logger = array(
      'id' => null,
      'level'  => $statuslog,
      'logger' => date('Y-m-d H:i:s') . " [" . $this->session->userdata('nama') . "] $statuslog " . $this->input->ip_address() . " - Error Message : " . $message . "",
      'ip' => $this->input->ip_address(),
      'created_at' => date('Y-m-d H:i:s')
    );
    $this->db->insert('logger', $logger);
  }
  function logger_info($message)
  {
    $statuslog = 'INFO';
    $logger = array(
      'id' => null,
      'level'  => $statuslog,
      'logger' => date('Y-m-d H:i:s') . " [" . $this->session->userdata('nama') . "] $statuslog " . $this->input->ip_address() . " - Message : " . $message . "",
      'ip' => $this->input->ip_address(),
      'created_at' => date('Y-m-d H:i:s')
    );
    $this->db->insert('logger', $logger);
  }
  function logger_debug($message)
  {
    $statuslog = 'DEBUG';
    $logger = array(
      'id' => null,
      'level'  => $statuslog,
      'logger' => date('Y-m-d H:i:s') . " [" . $this->session->userdata('nama') . "] $statuslog " . $this->input->ip_address() . " - Message : " . $message . "",
      'ip' => $this->input->ip_address(),
      'created_at' => date('Y-m-d H:i:s')
    );
    $this->db->insert('logger', $logger);
  }
}


/* End of file Login_model.php */
