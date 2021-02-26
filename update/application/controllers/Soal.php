<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Soal extends CI_Controller
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
        //   else{
        //     $role = $this->session->userdata('role');
        //     if($role!=='KARYAWAN' ){
        //         $session_data = array(
        //             'user_id' => $check_login->id,
        //             'role' => $check_login->role,
        //             'status' => $check_login->status,
        //             'logged_in' => TRUE
        //         );

        //         $this->session->unset_userdata($session_data);
        //         $this->session->set_flashdata('error', 'AKSES DI TOLAK SILAHKAN LOGIN LAGI');
        //         redirect('login');
        //     }
        // }

    }


    public function index()
    {
        if ($this->input->get('id') == null) {
            $this->session->set_flashdata('notif', $this->MNotif->alertfail('Materi Soal Salah / Tidak Ada'));
            redirect('pelatihan', 'refresh');
        } else {
            $cekmateri = $this->MData->selectsingledata('materi', array('id' => $this->input->get('id')));
            if ($cekmateri == FALSE) {
                $this->session->set_flashdata('notif', $this->MNotif->alertfail('Materi Soal Salah / Tidak Ada'));
                redirect('pelatihan', 'refresh');
            } else {
                // get cat id 
                $user_cat_id =  $cekmateri->materi_cat_id;
                //    cek user exist or not 
                $cekuserinusercatid = $this->MData->selectsingledata('users_materi_category', array('materi_cat_id' => $user_cat_id, 'nip' => $this->session->userdata('nip')));
                if ($cekuserinusercatid == FALSE) {
                    $this->session->set_flashdata('notif', $this->MNotif->alertfail('Materi Soal Salah / Tidak Ada'));
                    redirect('pelatihan', 'refresh');
                } else {
                    // cek apakah sudah di buat kan session soal
                    $ceksessionsoal = $this->MData->selectsingledata('users_materi_potition', array('nip' => $this->session->userdata('nip'), 'materi_id' => $this->input->get('id')));
                    if ($ceksessionsoal == FALSE) {
                        $tanggal_sekarang = date("Y-m-d H:i:s");
                        $expired = strtotime("$tanggal_sekarang + $cekmateri->durasi minute");
                        $expired_final = date('Y-m-d H:i:s', $expired);
                        $data_session =  array(

                            'id' => null,
                            'materi_id' => $this->input->get('id'),
                            'materi_cat_id' => $user_cat_id,
                            'nip' => $this->session->userdata('nip'),
                            'nama' => $this->session->userdata('nama'),
                            'materi_potition' => "pretest",
                            'start_test' => $tanggal_sekarang,
                            'end_test' => "0000-00-00 00:00",
                            'expired_test' => $expired_final,
                            'result' => "ONGOING",
                            'pretest' => "0",
                            'posttest' => "0",
                            'passinggrade' => $cekmateri->passinggrade,
                            'update_at' => "0000-00-00 00:00:00"
                        );
                        $this->MData->tambah('users_materi_potition', $data_session);
                        redirect("soal?id=" . $this->input->get('id'), 'refresh');
                    } else {
                    }
                    // Cek posisi user dimana
                    $cekposisi = $this->MData->selectsingledata('users_materi_potition', array('nip' => $this->session->userdata('nip'), 'materi_id' => $this->input->get('id')));
                    if ($cekposisi == FALSE) {
                        $posisi = "pretest";
                    } else {
                        $posisi = $cekposisi->materi_potition;
                    }
                    if ($posisi == "final") {
                        $this->session->set_flashdata('notif', $this->MNotif->alertfail('Materi ini sudah selesai di kerjakan'));
                        redirect('pelatihan', 'refresh');
                    } else {
                        $date_now = date('Y-m-d H:i:s');
                        $expired = $cekposisi->expired_test;
                        $diff = abs(strtotime($date_now) - strtotime($expired));

                        $data = array(
                            'materi_id' => $this->input->get('id'),
                            'materidata' => $cekmateri,
                            'cekmateripotition' => $posisi,
                            'datasoalpretest' => $this->MData->selectdataarray('materi_soal', array('category_soal' => 'pretest', 'materi_id' => $cekmateri->id)),
                            'datasoalposttest' => $this->MData->selectdataarray('materi_soal', array('category_soal' => 'posttest', 'materi_id' => $cekmateri->id)),

                        );
                        $this->session->set_flashdata('notif', $this->MNotif->timer($diff));
                        $this->template->load('layoutkaryawan', 'test/soal', $data);
                    }
                }
            }
        }
    }
    public function cekjawaban()
    {
        $materi_id = $this->input->post('materi_id');
        if ($this->input->post('test') == "pretest") {
            for ($i = 1; $i <= 5; $i++) {

                $soal = $this->input->post("a" . $i);
                $pecah = explode(',', $soal);
                // print_r($pecah);
                $cekjawaban = $this->MData->selectsingledata('materi_soal', array('id' => $pecah[0], 'answer' => $pecah[1]));
                if ($cekjawaban !== FALSE) {
                    $data = array(
                        'id' => null,
                        'materi_id' => $materi_id,
                        'materi_soal_id' => $pecah[0],
                        'jawaban' => "BENAR",
                        'soal' => "pretest",
                        'participant' => $this->session->userdata('nip'),
                        'created_at' => date('Y-m-d H:i:s')

                    );
                    $save = $this->MData->tambah('materi_jawabanlog', $data);
                    if ($save == true) {
                        $update = array(
                            'materi_potition' => 'materi'
                        );
                        $this->MData->edit(array('materi_id' => $materi_id, 'nip' => $this->session->userdata('nip')), 'users_materi_potition', $update);
                    } else {
                        echo json_encode(array('message' => "false"));
                    }
                } else {
                    $data = array(
                        'id' => null,
                        'materi_id' => $materi_id,
                        'materi_soal_id' => $pecah[0],
                        'jawaban' => "SALAH",
                        'soal' => "pretest",
                        'participant' => $this->session->userdata('nip'),
                        'created_at' => date('Y-m-d H:i:s')

                    );
                    $save = $this->MData->tambah('materi_jawabanlog', $data);
                    if ($save == true) {
                        $update = array(
                            'materi_potition' => 'materi'
                        );
                        $this->MData->edit(array('materi_id' => $materi_id, 'nip' => $this->session->userdata('nip')), 'users_materi_potition', $update);
                    } else {
                        echo json_encode(array('message' => "false"));
                    }
                }
            }
            $getnilaipretest = $this->MData->getValueResult('materi_jawabanlog', 'pretest', $this->session->userdata('nip'), $materi_id);
            $nilaipretest = $getnilaipretest->pretest / 5 * 100;
            $nilaipre = array('pretest' => $nilaipretest);
            $this->MData->edit(array('materi_id' => $materi_id, 'nip' => $this->session->userdata('nip')), 'users_materi_potition', $nilaipre);
            echo json_encode(array('message' => "true"));
        } elseif ($this->input->post('test') == "materi") {
            // JIka posisi materi sudah selesai , lanjut ke post test
            $update = array(
                'materi_potition' => 'posttest'
            );
            $this->MData->edit(array('materi_id' => $materi_id, 'nip' => $this->session->userdata('nip')), 'users_materi_potition', $update);
            echo json_encode(array('message' => "true"));
        } else {
            // Jika postest sudah selesai
            for ($i = 1; $i <= 5; $i++) {

                $soal = $this->input->post("a" . $i);
                $pecah = explode(',', $soal);
                // print_r($pecah);
                $cekjawaban = $this->MData->selectsingledata('materi_soal', array('id' => $pecah[0], 'answer' => $pecah[1]));
                if ($cekjawaban !== FALSE) {
                    $data = array(
                        'id' => null,
                        'materi_id' => $materi_id,
                        'materi_soal_id' => $pecah[0],
                        'jawaban' => "BENAR",
                        'soal' => "posttest",
                        'participant' => $this->session->userdata('nip'),
                        'created_at' => date('Y-m-d H:i:s')

                    );
                    $save = $this->MData->tambah('materi_jawabanlog', $data);
                } else {
                    $data = array(
                        'id' => null,
                        'materi_id' => $materi_id,
                        'materi_soal_id' => $pecah[0],
                        'jawaban' => "SALAH",
                        'soal' => "posttest",
                        'participant' => $this->session->userdata('nip'),
                        'created_at' => date('Y-m-d H:i:s')

                    );
                    $save = $this->MData->tambah('materi_jawabanlog', $data);
                }
            }
            $getnilaiposttest = $this->MData->getValueResult('materi_jawabanlog', 'posttest', $this->session->userdata('nip'), $materi_id);
            $nilaiposttest = $getnilaiposttest->posttest / 5 * 100;
            $getpassinggrade = $this->MData->selectsingledata('users_materi_potition', array('materi_id' => $materi_id, 'nip' => $this->session->userdata('nip')));
            if ($getpassinggrade->passinggrade <= $nilaiposttest) {
                $statuslulus = "LULUS";
            } else {
                $statuslulus =  "TIDAK LULUS";
            }
            $dataresulttest = array(
                'posttest' => $nilaiposttest,
                'result' => $statuslulus,
                'end_test' => date('Y-m-d H:i:s'),
                'materi_potition' => 'final'
            );

            $this->MData->edit(array('materi_id' => $materi_id, 'nip' => $this->session->userdata('nip')), 'users_materi_potition', $dataresulttest);

            echo json_encode(array('message' => "true"));
        }
    }
}
