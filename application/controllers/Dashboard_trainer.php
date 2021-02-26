<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_trainer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MLogin');
        $this->load->model('MNotif');
        $this->load->model('MData');
        $maintenance = $this->MData->selectmaintenance('maintenance', array('status' => 'T'));
        if ($maintenance !== FALSE) {
            redirect("maintenance", 'refresh');
        }
        $this->load->model('ModThirdapp');

        if ($this->session->userdata('logged_in') !== TRUE) {
            $this->session->set_flashdata('error', 'HARAP LOGIN DAHULU');
            redirect('login', 'refresh');
        } else {
            $role = $this->session->userdata('role');
            if ($role !== 'TRAINER') {
                $session_data = array(
                    'user_id' => $check_login->id,
                    'role' => $check_login->role,
                    'status' => $check_login->status,
                    'logged_in' => TRUE
                );

                // $this->session->unset_userdata($session_data);

                $this->session->sess_destroy();
                $this->session->set_flashdata('error', 'AKSES DI TOLAK SILAHKAN LOGIN LAGI');
                redirect('login');
            }
        }
    }
    public function index()
    {
        $data = array(
            'datacategory' => $this->MData->selectdata('materi_category', array('author' => $this->session->userdata('nip'), 'status' => 'AKTIF')),
        );

        $this->template->load('layouttrainer', 'dashboard/dashboard_trainer', $data);
    }
}
