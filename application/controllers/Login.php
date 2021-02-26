<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
        //load model login (model login isinya validasi session , dan cek login proses)
        $this->load->model('MData');
        $maintenance = $this->MData->selectmaintenance('maintenance', array('status' => 'T'));
        if ($maintenance !== FALSE) {
            redirect("maintenance", 'refresh');
        }
        $this->load->model('MLogin');
    }

    public function index()
    {
        $this->load->view('login/login');
    }
    public function validate()
    {
        if ($this->input->post('url') == null) {
            $url = "";
        } else {
            $url = $this->input->post('url');
        }
        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser() . ' ' . $this->agent->version();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = 'Data user gagal di dapatkan';
        }

        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $link = "https://www.latlong.net/c/?lat=$latitude&long=$longitude";
        $nip = $this->input->post('nip');
        $password = md5($this->input->post('password'));
        $check_login = $this->MLogin->check_login('users', array('nip' => $nip), array('password' => $password));
        if ($check_login == FALSE) {
            //Set flashdata login error / fail
            $this->session->set_flashdata('error', 'LOGIN ERROR PASSWORD SALAH');
            redirect('login');
        } else {
            //masuk ke dashboard berdasarkan devisi/role created season
            $cekdata = $this->MData->InnerJoinWhere('users', 'karyawan', 'nip', array("users.nip" => $nip));
            $session_data = array(
                'user_id' => $check_login->id,
                'role' => $check_login->role,
                'status' => $check_login->status,
                'nama' => $cekdata->nama,
                'email' => $cekdata->email,
                'nip' => $cekdata->nip,
                'department' => $cekdata->department,
                'photo' => $cekdata->photo,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);
            $datalog = array(
                'id_log' => null,
                'id_user' => $cekdata->nip,
                'email' => $cekdata->email,
                'nama' => $cekdata->nama,
                'start_login' => date('Y-m-d H:i:s'),
                'end_login' => "0000-00-00 00:00",
                'selisih_waktu' => "0",
                'device' => $agent,
                'ip' => $this->input->ip_address(),
                'map' => $link,
                'status' => "LOGIN",
            );
            $this->MData->tambah('users_loglogin', $datalog);
            if ($url == null || $url == "") {
                if ($session_data['role'] == 'KARYAWAN' && $session_data['status'] == 'aktif') {
                    redirect('dashboard_karyawan');
                } elseif ($session_data['role'] == 'LINE MANAGER' && $session_data['status'] == 'aktif') {
                    redirect('dashboard_lm');
                } elseif ($session_data['role'] == 'TRAINER' && $session_data['status'] == 'aktif') {
                    redirect('dashboard_trainer');
                } else {
                    redirect('dashboard');
                }
            } else {
                redirect($url);
            }
            // echo $session_data['role'];
            // var_dump($session_data);
        }
    }
    public function logout()
    {
        $data = array(
            'end_login' => date('Y-m-d H:i:s'),
            'status' => "LOGOUT",
        );
        $this->MData->edit(array(
            'nama' => $this->session->userdata('nama'),
            'id_user' => $this->session->userdata('nip'),
            'status' => "LOGIN",
        ), 'users_loglogin', $data);
        $this->session->sess_destroy();
        redirect('login');
    }
}
