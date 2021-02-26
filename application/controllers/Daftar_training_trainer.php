<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Daftar_training_trainer extends CI_Controller
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
        if ($this->session->userdata('logged_in') !== TRUE) {
            $this->session->set_flashdata('error', 'HARAP LOGIN DAHULU');
            redirect('login', 'refresh');
        }
    }

    public function index()
    {
        $data = array(
            'datacategory' => $this->MData->selectdata('materi_category', array('author' => $this->session->userdata('nip'), 'status' => 'AKTIF')),
        );
        $this->template->load('layouttrainer', 'training/daftar_training_trainer', $data);
    }
    public function category()
    {
        if ((null !== $this->input->post('nama'))) {
            $config['upload_path']          = './assets/img/uploads';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']             = 2048;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('fotonya')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('daftar_training_trainer', 'refresh');
            } else {
                $upload_data = $this->upload->data();
                $data = array(
                    'id' => null,
                    'nama' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'foto'  => $upload_data['file_name'],
                    'status' => "AKTIF",
                    'author' => $this->input->post('author'),
                    'created_at' => date('Y-m-d H:i:s')
                );

                $save = $this->MData->tambah('materi_category', $data);
                if ($save == true) {
                    $this->session->set_flashdata('notif', $this->MNotif->alertsuccess('Data berhasil di simpan'));
                    redirect('daftar_training_trainer', 'refresh');
                } else {
                    echo json_encode(array('message' => 'failed save data'));
                }
            }
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('daftar_training_trainer', 'refresh');
        }
    }
    public function getdataread()
    {
        if ($this->input->post('id') !== null) {
            $select = $this->MData->selectsingledata('materi', array('id' => $this->input->post('id')));
            if ($select == true) {
                $data = array(
                    "isi" => $select->isi,
                    'message' => 'true'
                );
                echo json_encode($data, true);
            } else {
                echo json_encode(array('message' => 'Fail'));
            }
        } else {
            echo json_encode(array('message' => 'Access Denied'));
        }
    }
    public function buatsoal()
    {
        $materi_id = $this->input->post('materi_id');
        $category_soal = $this->input->post('category_soal');

        for ($i = 1; $i <= 5; $i++) {
            $pilihan = $this->input->post('pilihan' . $i . 'a') . "," . $this->input->post('pilihan' . $i . 'b') . "," . $this->input->post('pilihan' . $i . 'c') . "," . $this->input->post('pilihan' . $i . 'd');
            $soal = $this->input->post('soal' . $i);
            $jawaban = $this->input->post('jawaban' . $i);
            $datasoal = array(
                'id' => null,
                'question' => $soal,
                'answer' => $jawaban,
                'answer_option' => $pilihan,
                'materi_id' => $materi_id,
                'category_soal' => $category_soal,
                'author' => $this->session->userdata('nip'),
                'queue' => rand(10, 1000),
                'created_at' => date('Y-m-d H:i:s'),
                'update_at' => "0000-00-00 00:00:00"
            );
            $this->MData->tambah('materi_soal', $datasoal);
        }
        $this->session->set_flashdata('notif', $this->MNotif->alertsuccess('Data Soal di Materi id <b>' . $materi_id . '</b> berhasil di simpan.'));
        redirect('daftar_training_trainer', 'refresh');
    }
    public function buatmateri()
    {
        if ((null !== $this->input->post('judul'))) {
            // setting document
            $config['upload_path']          = './assets/file/materi';
            $config['allowed_types']        = 'mp4|pdf';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('document')) {
                $this->session->set_flashdata('notif', $this->MNotif->alertfail("Document - " . $this->upload->display_errors()));
                redirect('daftar_training_trainer', 'refresh');
            } else {
                $upload_document = $this->upload->data();
            }

            $config1['upload_path']          = './assets/file/materi';
            $config1['allowed_types']        = 'mp4|pdf';
            $config1['encrypt_name'] = TRUE;

            $this->load->library('upload', $config1);
            $this->upload->initialize($config1);
            if (!$this->upload->do_upload('video')) {
                $this->session->set_flashdata('notif', $this->MNotif->alertfail("Video - " . $this->upload->display_errors()));
                redirect('daftar_training_trainer', 'refresh');
            } else {
                $upload_video = $this->upload->data();
                $data = array(
                    'id' => null,
                    'materi_cat_id' => $this->input->post('materi_cat_idnya'),
                    'judul' => $this->input->post('judul'),
                    'isi' => $this->input->post('isi'),
                    'video' => $upload_video['file_name'],
                    'document' => $upload_document['file_name'],
                    'passinggrade' => $this->input->post('passinggrade'),
                    'durasi' => $this->input->post('durasi'),
                    'author' => $this->input->post('author'),
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => "0000-00-00 00:00"
                );
                $save = $this->MData->tambah('materi', $data);
                if ($save == true) {
                    $this->session->set_flashdata('notif', $this->MNotif->alertsuccess('Data berhasil di simpan'));
                    redirect('daftar_training_trainer', 'refresh');
                } else {
                    echo json_encode(array('message' => 'failed save data'));
                }
            }
        } else {
            $this->session->set_flashdata('notif', $this->MNotif->alertfail("no id karyawan"));
            redirect('daftar_training_trainer', 'refresh');
        }
    }
    public function test()
    {
        for ($i = 1; $i <= 5; $i++) {
            $pilihan . $i = "ini" . $i . "<br>";
            echo  $pilihan . $i;
        }
    }
}
