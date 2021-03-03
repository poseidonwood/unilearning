<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Master_department extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MNotif');
        $this->load->model('MLogin');
        $this->load->model('MData');
        $maintenance = $this->MData->selectmaintenance('maintenance', array('status' => 'T'));
        if ($maintenance !== FALSE) {
            redirect("maintenance", 'refresh');
        }
        $this->load->library('Excel');
        $this->load->model('ModThirdapp');
        if ($this->session->userdata('logged_in') !== TRUE) {
            $this->session->set_flashdata('error', 'HARAP LOGIN DAHULU');
            redirect("login?continue=" . current_url(), 'refresh');
        }
    }

    public function index()
    {
        $data = array(
            'datadepartment' => $this->MData->selectdataglobal2('karyawan_department')
        );
        $this->template->load('layout', 'master/department', $data);
    }

    // Add a new item
    public function add()
    {
        if ($this->input->post('code') == null || $this->input->post('department') == null || $this->input->post('ket') == null) {
            echo json_encode(array('message' => 'Cant access this page'));
        } else {
            $savedata = array(
                'id' => null,
                'code' => $this->input->post('code'),
                'department' => $this->input->post('department'),
                'ket' => $this->input->post('ket'),
                'created_at' => date('Y-m-d H:i:s')
            );
            $save = $this->MData->tambah('karyawan_department', $savedata);
            if ($save !== false) {
                $this->session->set_flashdata('notif', $this->MNotif->alertsuccess('Data berhasil di simpan'));
                redirect('master_department', 'refresh');
            } else {
                $this->session->set_flashdata('notif', $this->MNotif->alertfail('Data gagal disimpan'));
                redirect('master_department', 'refresh');
            }
        }
    }

    //Update one item
    public function readupdate()
    {
        if ($this->input->post('id') !== null) {
            $id = $this->input->post('id');
            $cekdata = $this->MData->selectdatawhere('karyawan_department', array('id' => $id));
            if ($cekdata == FALSE) {
                echo json_encode(array('message' => 'Cant access this page'));
            } else {
                $data = array(
                    'id' => $cekdata->id,
                    'code' => $cekdata->code,
                    'department' => $cekdata->department,
                    'ket' => $cekdata->ket,
                    'message' => true
                );
                echo json_encode($data);
            }
        } else {
            echo json_encode(array('message' => 'Cant access this page'));
        }
    }
    public function update()
    {
        if ($this->input->post('id') !== null) {
            $id = $this->input->post('id');
            $cekdata = $this->MData->selectdatawhere('karyawan_department', array('id' => $id));
            if ($cekdata == FALSE) {
                echo json_encode(array('message' => 'Cant access this page'));
            } else {
                $data = array(
                    'code' => $this->input->post('code'),
                    'department' => $this->input->post('department'),
                    'ket' => $this->input->post('ket'),

                );
                $update =  $this->MData->edit(array('id' => $id), 'karyawan_department', $data);
                if ($update !== false) {
                    $this->session->set_flashdata('notif', $this->MNotif->alertsuccess('Data berhasil diupdate'));
                    redirect('master_department', 'refresh');
                } else {
                    $this->session->set_flashdata('notif', $this->MNotif->alertfail('Data gagal diupdate'));
                    redirect('master_department', 'refresh');
                }
            }
        } else {
            echo json_encode(array('message' => 'Cant access this page'));
        }
    }


    //Delete one item
    public function delete()
    {
        if ($this->input->post('id') !== null) {
            $id = $this->input->post('id');
            $cekdata = $this->MData->selectdatawhere('karyawan_department', array('id' => $id));
            if ($cekdata == FALSE) {
                echo json_encode(array('message' => 'Cant access this page'));
            } else {
                $delete = $this->MData->delete('karyawan_department', array('id' => $id));
                if ($delete == true) {
                    $data = array(
                        'url' => '/master_department',
                        'message' => "Delete Success"
                    );
                    echo json_encode($data);
                } else {
                    $data = array(
                        'message' => "Fail"
                    );
                    echo json_encode($data);
                }
            }
        } else {
            echo json_encode(array('message' => 'Cant access this page'));
        }
    }
}
