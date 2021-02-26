<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Database_e_certificate extends CI_Controller
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
        $this->load->model('ModThirdapp');
    }
    public function index()
    {
        $cekdata = $this->MData->InnerJoin('e_certificate', 'karyawan', 'nip');
        $userdata = $this->MData->InnerJoin('users', 'karyawan', 'nip');
        $data = array(
            'cekdata' => $cekdata,
            'kode' => $this->TambahKode(),
            'userdata' => $userdata
        );
        $this->template->load('layout', 'database_e_certificate/database_certificate', $data);
    }

    // Id transaksi
    public function TambahKode()
    {
        //ID TRANSAKSI //
        $cek_id = $this->MData->getMaxIdTransaksi('e_certificate');
        if ($cek_id == true) {
            $gId_transaksi = ($cek_id->max_kode) + 1;
            // $strId_transaksi = (int)(str_replace('TRX', '', $gId_transaksi));
            $id_transaksi = "CE" . sprintf("%03s", $gId_transaksi);
        } else {
            $id_transaksi = 'CE001';
        }
        return $id_transaksi;
    }

    // Proses
    public function proses()
    {

        if ((null !== $this->input->post('nm_karyawan'))) {
            $config['upload_path']          = './assets/img/uploads';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']             = 2048;
            // $config['max_width']            = 1366;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('filenya')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('database_e_certificate', 'refresh');
            } else {
                // kode// nip//no_certificate//no_lisensi//nama_certificate//pic//provider//tanggal_terbit//tanggal_expired//note//files
                $upload_data = $this->upload->data();
                $data = array(
                    'kode' => $this->input->post('kode'),
                    'nip' => $this->input->post('nm_karyawan'),
                    'no_certificate' => $this->input->post('no_certificate'),
                    'no_lisensi' => $this->input->post('no_lisensi'),
                    'nama_certificate' => $this->input->post('nama_certificate'),
                    'pic' => $this->input->post('pic'),
                    'provider' => $this->input->post('provider'),
                    'tanggal_terbit' => $this->input->post('tanggal_terbit'),
                    'tanggal_expired' => $this->input->post('tanggal_expired'),
                    'note' => $this->input->post('note'),
                    'files' => $upload_data['file_name']
                );

                $save = $this->MData->tambah('e_certificate', $data);
                if ($save == true) {
                    $this->session->set_flashdata('notif', $this->MNotif->alertsuccess('Data berhasil di simpan'));
                    redirect('database_e_certificate', 'refresh');
                } else {
                    echo json_encode(array('message' => 'failed save data'));
                }
                // $this->Gambar_model->create($this->upload->data());
            }
        } else {
            redirect('database_e_certificate', 'refresh');
        }
    }
    public function update()
    {
        $kode =  $this->input->post('kode');
        $config['upload_path']          = './assets/img/uploads';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
        $config['max_size']             = 2048;
        // $config['max_width']            = 1366;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('filenya')) {
            // kode// nip//no_certificate//no_lisensi//nama_certificate//pic//provider//tanggal_terbit//tanggal_expired//note//files
            $upload_data = $this->upload->data();
            $data = array(
                'nip' => $this->input->post('nm_karyawan'),
                'no_certificate' => $this->input->post('no_certificate'),
                'no_lisensi' => $this->input->post('no_lisensi'),
                'nama_certificate' => $this->input->post('nama_certificate'),
                'pic' => $this->input->post('pic'),
                'provider' => $this->input->post('provider'),
                'tanggal_terbit' => $this->input->post('tanggal_terbit'),
                'tanggal_expired' => $this->input->post('tanggal_expired'),
                'note' => $this->input->post('note'),
                'files' => $upload_data['file_name']
            );
            $update = $this->MData->edit(array('kode' => $kode), 'e_certificate', $data);
            if ($update == true) {
                $this->session->set_flashdata('notif', $this->MNotif->alertsuccess('Data berhasil di update'));
                redirect('database_e_certificate', 'refresh');
            } else {
                echo json_encode(array('message' => 'failed update data'));
            }
        } else {
            $data = array(
                'nip' => $this->input->post('nm_karyawan'),
                'no_certificate' => $this->input->post('no_certificate'),
                'no_lisensi' => $this->input->post('no_lisensi'),
                'nama_certificate' => $this->input->post('nama_certificate'),
                'pic' => $this->input->post('pic'),
                'provider' => $this->input->post('provider'),
                'tanggal_terbit' => $this->input->post('tanggal_terbit'),
                'tanggal_expired' => $this->input->post('tanggal_expired'),
                'note' => $this->input->post('note')
            );

            $update = $this->MData->edit(array('kode' => $kode), 'e_certificate', $data);
            if ($update == true) {
                $this->session->set_flashdata('notif', $this->MNotif->alertsuccess('Data berhasil di update'));
                redirect('database_e_certificate', 'refresh');
            } else {
                echo json_encode(array('message' => 'failed update data'));
            }
        }
    }

    public function delete()
    {
        if ($this->input->post('id') !== null) {
            $delete = $this->MData->delete('e_certificate', array('kode' => $this->input->post('id')));
            if ($delete == true) {
                echo json_encode(array('message' => 'Delete Success', 'url' => '/database_e_certificate'));
            } else {
                echo json_encode(array('message' => 'Delete Fail'));
            }
        } else {
            echo json_encode(array('message' => 'Access Denied'));
        }
    }
    public function dataedit()
    {
        if ($this->input->post('id') !== null) {
            $select = $this->MData->selectsingledata('e_certificate', array('kode' => $this->input->post('id')));
            if ($select == true) {
                $data = array(
                    "kode" => $select->kode,
                    "nip" => $select->nip,
                    "nama_karyawan" =>  $this->getNameFromNIP($select->nip),
                    "no_certificate" => $select->no_certificate,
                    "no_lisensi" => $select->no_lisensi,
                    "nama_certificate" => $select->nama_certificate,
                    "pic" => $select->pic,
                    "nama_pic" => $this->getNameFromNIP($select->pic),
                    "provider" => $select->provider,
                    "tanggal_terbit" => $select->tanggal_terbit,
                    "tanggal_expired" => $select->tanggal_expired,
                    "note" => $select->note,
                    "files" => $select->files
                );
                echo json_encode($data, true);
            } else {
                echo json_encode(array('message' => 'Fail'));
            }
        } else {
            echo json_encode(array('message' => 'Access Denied'));
        }
    }

    public function getNameFromNIP($id = null)
    {
        if ($id !== null) {
            $select = $this->MData->selectcolomnsingledata('nama', 'karyawan', array('nip' => $id));
            if ($select == true) {
                return $select->nama;
            } else {
                echo json_encode(array('message' => 'Fail'));
            }
        } else {
            echo json_encode(array('message' => 'Access Denied'));
        }
    }
}
