<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Master_factory extends CI_Controller
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
        } else {
            $role = $this->session->userdata('role');
            // if ($role !== 'ADMIN' || $role !== 'SUPERADMIN') {
            //     $rolenya = $this->session->userdata('role');
            //     $this->session->sess_destroy();
            //     $this->session->set_flashdata('error', 'AKSES DI TOLAK SILAHKAN LOGIN LAGI ' . $rolenya);
            //     redirect('login');
            // }
        }
    }

    // List all your items
    public function index()
    {
        $this->template->load('layout', 'master/factory');
    }


    // Add a new item
    public function add()
    {
    }

    //Update one item
    public function update($id = NULL)
    {
    }

    //Delete one item
    public function delete($id = NULL)
    {
    }
}

/* End of file Controllername.php */
