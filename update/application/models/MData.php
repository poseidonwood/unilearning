<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MData extends CI_Model
{

  function InnerJoin($table1, $table2, $data)
  {
    // $this->db->query("SELECT * FROM $table LEFT JOIN karyawan ON users.nip = karyawan.nip");
    $this->db->select('*');
    $this->db->from($table1);
    $this->db->join($table2, "$table1" . '.' . "$data = $table2" . '.' . "$data");
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function InnerJoinWhere($table1, $table2, $data, $value)
  {
    // $this->db->query("SELECT * FROM $table LEFT JOIN karyawan ON users.nip = karyawan.nip");
    $this->db->select('*');
    $this->db->from($table1);
    $this->db->join($table2, "$table1" . '.' . "$data = $table2" . '.' . "$data");
    $this->db->where($value);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }
  function InnerJoinWhereResult($table1, $table2, $data, $value)
  {
    // $this->db->query("SELECT * FROM $table LEFT JOIN karyawan ON users.nip = karyawan.nip");
    $this->db->select('*');
    $this->db->from($table1);
    $this->db->join($table2, "$table1" . '.' . "$data = $table2" . '.' . "$data");
    $this->db->where($value);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }

  function selectdata($table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function selectlog($table)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->order_by('start_login', 'desc');
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function selectmaintenance($table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    // $this->db->like('whitelist_ip', $this->input->ip_address(), 'both');
    $this->db->where($value);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }
  function selectdataarray($table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $this->db->order_by('queue', 'desc');
    $this->db->limit(5);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result_array();
    }
  }
  function selectdatawhere($table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }
  function selectdataglobal($table)
  {
    $this->db->select('*');
    $this->db->from($table);
    // $this->db->where($value);
    $this->db->order_by('tanggal_terbit', 'desc');
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function selectdataglobal2($table)
  {
    $this->db->select('*');
    $this->db->from($table);
    // $this->db->where($value);
    $this->db->order_by('created_at', 'desc');
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }

  function selectcolomnsingledata($colomn, $table, $value)
  {
    $this->db->select($colomn);
    $this->db->from($table);
    $this->db->where($value);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }
  function selectsingledata($table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }
  public function selectsingledatadoblewhere($table, $value, $value1)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $this->db->where($value1);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }
  public function tambah($table, $data)
  {
    if ($this->db->insert($table, $data)) {
      return true;
    } else {
      return false;
    }
  }
  public function delete($table, $value)
  {
    if ($this->db->delete($table, $value)) {
      return true;
    } else {
      return false;
    }
  }
  function edit($value, $table, $data)
  {
    $this->db->where($value);
    $update = $this->db->update($table, $data);
    if ($update) {
      return true;
    } else {
      return false;
    }
  }
  public function selectsingledatawithsort($table, $value, $kolom, $sort)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $this->db->order_by($kolom, $sort);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }
  public function getMaxIdTransaksi($table)
  {
    $query = $this->db->query("SELECT MAX(CAST(SUBSTRING(kode, 4, length(kode)-3) AS UNSIGNED)) as max_kode FROM $table
    ");
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }
  public function getValueResult($table, $soal, $nip, $materi_id)
  {
    $query = $this->db->query("SELECT count(*) as $soal from $table where jawaban = 'BENAR' and participant = '$nip' and materi_id = '$materi_id' and soal = '$soal'");
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }
  public function hitungdata($table, $value)
  {
    $this->db->where($value);
    $query =  $this->db->count_all_results($table);
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }
}
