<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MLogin extends CI_Model
{


  function logged_id($session)
  {
    if($this->session->userdata($session) !== null){
      return true;
    }else{
      return false;
    }
  }
  function check_login($table, $field1, $field2)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($field1);
    $this->db->where($field2);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }
}


/* End of file Login_model.php */
