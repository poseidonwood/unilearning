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
        $this->load->model('MNotif');
        $this->load->model('MLogger');
        $maintenance = $this->MData->selectmaintenance('maintenance', array('status' => 'T'));
        if ($maintenance !== FALSE) {
            redirect("maintenance", 'refresh');
        }
        $this->load->model('MLogin');
    }

    public function index()
    {

        $checkip = $this->MData->selectdatawhereorderby('users_loglogin', array('ip' => $this->input->ip_address(), 'status' => 'LOGIN FAIL 3x'));
        if ($checkip !== FALSE) {
            $bannedtime = $checkip->end_login;
            if (strtotime(date('Y-m-d H:i:s')) < strtotime($bannedtime)) {
                $this->session->set_flashdata('error', $this->MNotif->alertfail('Anda melakukan login dengan password salah 3 kali, Anda bisa login kembali pukul : ' . $bannedtime));
                $this->MLogger->logger_error(current_url() . " - " . "Anda melakukan login dengan password salah 3 kali, Anda bisa login kembali pukul :  $bannedtime");

                $this->load->view('login/login');
            }
            $this->load->view('login/login');
        }
        $this->load->view('login/login');
    }
    public function validate()
    {
        $checkip = $this->MData->selectdatawhereorderby('users_loglogin', array('ip' => $this->input->ip_address(), 'status' => 'LOGIN FAIL 3x'));
        if ($checkip !== null) {
            $bannedtime = $checkip->end_login;
            if (strtotime(date('Y-m-d H:i:s')) < strtotime($bannedtime)) {
                $this->session->set_flashdata('error', $this->MNotif->alertfail('Anda melakukan login dengan password salah 3 kali, Anda bisa login kembali pukul : ' . $bannedtime));
                $this->MLogger->logger_error(current_url() . " - " . "Anda melakukan login dengan password salah 3 kali, Anda bisa login kembali pukul :  $bannedtime");
                redirect('login', 'refresh');
            }
        }

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
            $this->MLogger->logger_debug(current_url() . " - " . "$agent");
        }

        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $link = "https://www.latlong.net/c/?lat=$latitude&long=$longitude";
        $employee_id = $this->input->post('nip');
        $password = md5($this->input->post('password'));

        $check_login = $this->MLogin->check_login('users', array('employee_id' => $employee_id), array('password' => $password));
        $cekdata = $this->MData->InnerJoinWhere('users', 'karyawan_revisi', 'employee_id', array("users.employee_id" => $employee_id));

        if ($check_login == FALSE) {
            //cek session 
            $sessionfail = $this->session->userdata('login_fail');
            // jika session  fail null , maka buat session fail 1 
            if ($sessionfail == null) {
                $sessionfail1 = array(
                    'login_fail' => '1',
                    'timelogin' => date('Y-m-d H:i:s')
                );
                $loginfail1 = $sessionfail1['login_fail'];
                if ($loginfail1 !== '1' || $loginfail1 <= 1) {
                    $this->session->set_userdata($sessionfail1);
                    $this->session->set_flashdata(
                        'error',
                        'LOGIN ERROR PASSWORD SALAH, Kesempatan Login 2x Lagi'
                    );
                    $this->MLogger->logger_error(current_url() . " - " . "LOGIN ERROR PASSWORD SALAH, Kesempatan Login 2x Lagi");

                    redirect('login');
                }
            } else if ($sessionfail == 1) {
                $sessionfail1 = array(
                    'login_fail' => '2'
                );
                $loginfail1 = $sessionfail1['login_fail'];
                if ($loginfail1 !== '2' || $loginfail1 <= 2) {
                    $this->session->set_userdata($sessionfail1);
                    $this->session->set_flashdata('error', 'LOGIN ERROR PASSWORD SALAH, Kesempatan Login 1x Lagi');
                    $this->MLogger->logger_error(current_url() . " - " . "LOGIN ERROR PASSWORD SALAH, Kesempatan Login 1x Lagi");

                    redirect('login');
                }
            } else {
                $datalog = array(
                    'id_log' => null,
                    'id_user' => $employee_id,
                    'email' => 'email',
                    'nama' => 'nama',
                    'start_login' =>
                    $this->session->userdata('timelogin'),
                    'end_login' => date('Y-m-d H:i:s', strtotime('+1 minutes', strtotime(date('Y-m-d H:i:s')))),
                    'selisih_waktu' => "0",
                    'device' => $agent,
                    'ip' => $this->input->ip_address(),
                    'map' => $link,
                    'status' => "LOGIN FAIL 3x",
                );
                $this->MData->tambah('users_loglogin', $datalog);
                $this->session->unset_userdata(array('login_fail', 'timelogin'));
                $this->session->set_flashdata('error', $this->MNotif->alertfail('Anda melakukan login dengan password salah 3 kali, tunggu 1 menit'));
                $this->MLogger->logger_error(current_url() . " - " . "Anda melakukan login dengan password salah 3 kali, Anda bisa login kembali pukul :  $bannedtime");

                redirect('login');
            }
            //Set flashdata login error / fail
        } else {
            $this->session->unset_userdata(array('login_fail', 'timelogin'));
            if ($cekdata == FALSE) {
                $this->session->set_flashdata('error', $this->MNotif->alertfail('Data ini tidak ada di list karyawan'));
                redirect('login');
            } else {
                //masuk ke dashboard berdasarkan devisi/role created season
                $session_data = array(
                    'user_id' => $check_login->id,
                    'role' => $check_login->role,
                    'status' => $check_login->status,
                    'nama' => $cekdata->employee_name,
                    'email' => $cekdata->email,
                    'employee_id' => $cekdata->employee_id,
                    'department' => $cekdata->department,
                    'business_title' => $cekdata->business_title,
                    'photo' => $cekdata->image,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
                $datalog = array(
                    'id_log' => null,
                    'id_user' => $cekdata->employee_id,
                    'email' => $cekdata->email,
                    'nama' => $cekdata->employee_name,
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
                        $this->MLogger->logger_info(current_url() . " - " . "User : " . $datalog['id_user'] . " direct link dashboard " . $session_data['role'] . "");
                        redirect('dashboard_karyawan');
                    } elseif ($session_data['role'] == 'LINE MANAGER' && $session_data['status'] == 'aktif') {
                        $this->MLogger->logger_info(current_url() . " - " . "User : " . $datalog['id_user'] . " direct link dashboard " . $session_data['role'] . "");
                        redirect('dashboard_lm');
                    } elseif ($session_data['role'] == 'TRAINER' && $session_data['status'] == 'aktif') {
                        $this->MLogger->logger_info(current_url() . " - " . "User : " . $datalog['id_user'] . " direct link dashboard " . $session_data['role'] . "");
                        redirect('dashboard_trainer');
                    } else {
                        $this->MLogger->logger_info(current_url() . " - " . "User : " . $datalog['id_user'] . " direct link dashboard " . $session_data['role'] . "");
                        redirect('dashboard');
                    }
                } else {
                    redirect($url);
                }
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
        $this->MLogger->logger_info(current_url() . " - " . "Message : " . $datalog['id_user'] . " has been logout");
        $this->session->sess_destroy();
        redirect('login');
    }
    public function cekqr()
    {
        $qrcode = $this->input->post('qrcode');
        if (empty($qrcode) || !isset($qrcode)) {
            echo json_encode(array('message' => 'Cant access this site'));
        } else {
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
            $check_login = $this->MData->selectdataglobal('users');
            foreach ($check_login as $cekqr) {
                $nipnya = $cekqr->employee_id;
                $password = $cekqr->password;
                $qrcode2 = $nipnya . $password;
                if ($qrcode == $qrcode2) {
                    //masuk ke dashboard berdasarkan devisi/role created season
                    $cekdata = $this->MData->InnerJoinWhere('users', 'karyawan_revisi', 'employee_id', array("users.employee_id" => $nipnya));
                    $session_data = array(
                        'user_id' => $cekqr->id,
                        'role' => $cekqr->role,
                        'status' => $cekqr->status,
                        'nama' => $cekdata->employee_name,
                        'email' => $cekdata->email,
                        'employee_id' => $cekdata->employee_id,
                        'business_title' => $cekdata->business_title,
                        'department' => $cekdata->department,
                        'photo' => $cekdata->image,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($session_data);
                    $datalog = array(
                        'id_log' => null,
                        'id_user' => $cekdata->employee_id,
                        'email' => $cekdata->email,
                        'nama' => $cekdata->employee_name,
                        'start_login' => date('Y-m-d H:i:s'),
                        'end_login' => "0000-00-00 00:00",
                        'selisih_waktu' => "0",
                        'device' => $agent,
                        'ip' => $this->input->ip_address(),
                        'map' => $link,
                        'status' => "LOGIN",
                    );
                    $this->MData->tambah('users_loglogin', $datalog);
                    if ($session_data['role'] == 'KARYAWAN' && $session_data['status'] == 'aktif') {
                        echo json_encode(array('url' => 'dashboard_karyawan'));
                    } elseif ($session_data['role'] == 'LINE MANAGER' && $session_data['status'] == 'aktif') {
                        echo json_encode(array('url' => 'dashboard_lm'));
                    } elseif ($session_data['role'] == 'TRAINER' && $session_data['status'] == 'aktif') {
                        echo json_encode(array('url' => 'dashboard_trainer'));
                    } else {
                        echo json_encode(array('url' => 'dashboard'));
                    }
                }
            }
        }
    }
}
