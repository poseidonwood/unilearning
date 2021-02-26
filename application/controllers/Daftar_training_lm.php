<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_training_lm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MLogin');
        $this->load->model('MNotif');
        $this->load->model('ModThirdapp');
        $this->load->model('MData');
        $maintenance = $this->MData->selectmaintenance('maintenance', array('status' => 'T'));
        if ($maintenance !== FALSE) {
            redirect("maintenance", 'refresh');
        }
        if ($this->session->userdata('logged_in') !== TRUE) {
            $this->session->set_flashdata('error', 'HARAP LOGIN DAHULU');
            redirect("login?continue=" . current_url(), 'refresh');
        } else {
            $role = $this->session->userdata('role');
            if ($role !== 'LINE MANAGER') {
                $this->session->sess_destroy();
                $this->session->set_flashdata('error', 'AKSES DI TOLAK SILAHKAN LOGIN LAGI');
                redirect('login');
            }
        }
    }

    public function index()
    {
        $userdata = $this->MData->InnerJoinWhereResult('users', 'karyawan', 'nip', array('role' => 'KARYAWAN'));
        $data = array(
            'userdata' => $userdata,
            'datacategory' => $this->MData->selectdata('materi_category', array('status' => 'AKTIF')),
        );
        $this->template->load('layoutlm', 'training/daftar_training_lm', $data);
    }
    public function kirimajukan()
    {
        if ($this->input->post('id') !== null) {
            // cek apakah nip dan cat ini udh ada di db
            $select = $this->MData->selectdatawhere('users_materi_category', array('nip' => $this->input->post('nip'), 'materi_cat_id' => $this->input->post('id')));
            $select_name = $this->MData->selectdatawhere('materi_category', array('id' => $this->input->post('id')));
            $select_karyawan = $this->MData->selectdatawhere('karyawan', array('nip' => $this->input->post('nip')));
            if ($select == FALSE) {
                $data = array(
                    'id' => null,
                    'materi_cat_id' => $this->input->post('id'),
                    'materi_cat_name' => $select_name->nama,
                    'nip' => $this->input->post('nip'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'update_at' => "0000-00-00 00:00:00"
                );
                $save = $this->MData->tambah('users_materi_category', $data);
                if ($save == true) {
                    $data = array(
                        'message' => 'true'
                    );
                    echo json_encode($data, true);
                } else {
                    echo json_encode(array('message' => 'fail'));
                }
            } else {
                echo json_encode(array('message' => 'fail'));
            }
        } else {
            echo json_encode(array('message' => 'Access Denied'));
        }
    }
}
