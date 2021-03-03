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
        $data = array(
            'datafactory' => $this->MData->selectdataglobal2('karyawan_factory')
        );
        $this->template->load('layout', 'master/factory', $data);
    }


    // Add a new item
    public function add()
    {
        if ($this->input->post('factory_name') == null || $this->input->post('factory_name') == "") {
            echo json_encode(array('message' => 'Cant access this page'));
        } else {
            $savedata = array(
                'id' => null,
                'factory' => $this->input->post('factory_name'),
                'created_by' => $this->session->userdata('nip'),
                'created_at' => date('Y-m-d H:i:s')
            );
            $save = $this->MData->tambah('karyawan_factory', $savedata);
            if ($save !== false) {
                $this->session->set_flashdata('notif', $this->MNotif->alertsuccess('Data berhasil di simpan'));
                redirect('master_factory', 'refresh');
            } else {
                $this->session->set_flashdata('notif', $this->MNotif->alertfail('Data gagal disimpan'));
                redirect('master_factory', 'refresh');
            }
        }
    }

    //Update one item
    public function readupdate()
    {
        if ($this->input->post('id') !== null) {
            $id = $this->input->post('id');
            $cekdata = $this->MData->selectdatawhere('karyawan_factory', array('id' => $id));
            if ($cekdata == FALSE) {
                echo json_encode(array('message' => 'Cant access this page'));
            } else {
                $data = array(
                    'id' => $cekdata->id,
                    'factory' => $cekdata->factory,
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
        if ($this->input->post('factory_id') !== null) {
            $id = $this->input->post('factory_id');
            $cekdata = $this->MData->selectdatawhere('karyawan_factory', array('id' => $id));
            if ($cekdata == FALSE) {
                echo json_encode(array('message' => 'Cant access this page'));
            } else {
                $data = array(
                    'factory' => $this->input->post('factory_name'),
                );
                $update =  $this->MData->edit(array('id' => $id), 'karyawan_factory', $data);
                if ($update !== false) {
                    $this->session->set_flashdata('notif', $this->MNotif->alertsuccess('Data berhasil diupdate'));
                    redirect('master_factory', 'refresh');
                } else {
                    $this->session->set_flashdata('notif', $this->MNotif->alertfail('Data gagal diupdate'));
                    redirect('master_factory', 'refresh');
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
            $cekdata = $this->MData->selectdatawhere('karyawan_factory', array('id' => $id));
            if ($cekdata == FALSE) {
                echo json_encode(array('message' => 'Cant access this page'));
            } else {
                $delete = $this->MData->delete('karyawan_factory', array('id' => $id));
                if ($delete == true) {
                    $data = array(
                        'url' => '/master_factory',
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

/* End of file Controllername.php */
