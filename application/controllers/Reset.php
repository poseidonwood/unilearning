<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Reset extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
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
        $this->load->view('login/reset_password');
    }

    // PROSES DATA
    public function proses()
    {
        $email = $this->input->post('email');
        //cek email apa tersedia di db
        $cek = $this->MData->selectsingledata('users', array('email' => $email));

        //cek apakah si email ini pernah request token dalam jangka waktu 3 menit
        $cek_token = $this->MData->selectsingledatawithsort('users_lupapas', array('email_user' => $email), 'created_at', 'desc');
        if ($cek_token !== FALSE) {
            $cekdatakar = $this->MData->selectsingledata('karyawan_revisi', array('email' => $email));
            $created = $cek_token->created_at;
            //add 3 minutes to time
            $created3menit = (int)strtotime(date('Y-m-d H:i:s', strtotime('+3 minutes', strtotime($created))));
            $datenow = (int)strtotime(date('Y-m-d H:i:s'));
            // $detik = ($datenow - $created)/60;
            // End mendapatkan selisih menit
            if ($datenow <= $created3menit) {
                $this->session->set_flashdata('alert', json_encode(array('error' => "Silahkan tunggu 3 menit untuk merequest code lagi.")));
                redirect('reset', 'refresh');
            } else {
                // token lama di update
                $id_tokenlama = $cek_token->id;
                $data_update = array(
                    'token_status' => 'EXPIRED',
                    'status_akun' => 'NOT USED'
                );
                $this->db->where('id', $id_tokenlama);
                $this->db->update('users_lupapas', $data_update);

                // created token lagi
                // GENERATE TOKEN
                $token = uniqid();
                $data = array(
                    'id' => "",
                    'id_user' => $cek->id,
                    'email_user' => $email,
                    'token'    => $token,
                    'token_status' => 'VALID',
                    'status_akun' => 'NOT USED',
                    'created_at' => date('Y-m-d H:i:s'),
                    'expired_at' => date("Y-m-d H:i:s", strtotime("+1 hours"))
                );
                $pesan = "
                Yth $cekdatakar->employee_name,\r\n
                Kami telah menerima permintaan untuk mengatur ulang password Anda.\r\n
                Silahan klik link berikut [" . base_url("reset/link/$token") . "] untuk mengatur ulang password Anda.

                Salam,
                UNILEVER";
                $this->MData->tambah('users_lupapas', $data);
                $send = $this->ModThirdapp->sendwa($cekdatakar->telepon, $pesan);
                $this->session->set_flashdata('alert', "Silahkan cek email <b>$email</b> untuk merubah password anda..");
                redirect('reset', 'refresh');
            }
        } else {
            if ($cek !== FALSE) {
                // GENERATE TOKEN
                $cekdatakar = $this->MData->selectsingledata('karyawan_revisi', array('email' => $email));
                $token = uniqid();
                $data = array(
                    'id' => "",
                    'id_user' => $cek->id,
                    'email_user' => $email,
                    'token'    => $token,
                    'token_status' => 'VALID',
                    'status_akun' => 'NOT USED',
                    'created_at' => date('Y-m-d H:i:s'),
                    'expired_at' => date("Y-m-d H:i:s", strtotime("+1 hours"))
                );
                $pesan = "
                Yth $cekdatakar->employee_name,\r\n
                Kami telah menerima permintaan untuk mengatur ulang password Anda.\r\n
                Silahan klik link berikut [" . base_url("reset/link/$token") . "] untuk mengatur ulang password Anda.

                Salam,
                UNILEVER";
                $this->MData->tambah('users_lupapas', $data);
                $send = $this->ModThirdapp->sendwa($cekdatakar->telepon, $pesan);
                $this->session->set_flashdata('alert', "Silahkan cek email <b>$email</b> untuk merubah password anda.");
                redirect('reset', 'refresh');
            } else {
                $this->session->set_flashdata('alert', json_encode(array('message' => 'email tidak ada di database')));
                redirect('reset', 'refresh');
            }
        }
    }
    public function testemail($subject = null, $pesan = null)
    {
        $this->ModThirdapp->sendemail('waluyo.skmi@gmail.com', $subject, $pesan);
    }
    public function testwa($nomor = null, $pesan = null)
    {
        $this->ModThirdapp->sendwa($nomor, $pesan);
    }
    public function test()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://ulirungkut.com:2083/execute/ServerInformation/get_information');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Authorization: cpanel ulipowerskmi:3LDIBH7A9P8NZ45PUKF0I6JGA7ODGJ7K';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $resultserver = json_decode($result,true);
        $value_memory = $resultserver['data'][24]['value'];
        $name_memory = $resultserver['data'][24]['name'];
        $value_disk = $resultserver['data'][26]['value'];
        $name_disk = $resultserver['data'][26]['name'];
        $name_database = $resultserver['data'][14]['name'];
        $value_database = $resultserver['data'][14]['value'];
        $data = array(
            $name_memory => $value_memory,
            $name_disk => $value_disk,
            $name_database => $value_database
        );
        echo json_encode($data);
    }
    public function test2()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://app.statuscake.com/API/Tests/Details/?TestID=5895005');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Api: FUb1EUCLqRthzO4uhSEF';
        $headers[] = 'Username: febrinimimyid';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $resultnya = json_decode($result,true);
        echo $result;
    }
    public function link($token = null)
    {
        $cek_token = $this->MData->selectsingledatadoblewhere('users_lupapas', array('token' => $token), array('token_status' => 'VALID'));
        if ($cek_token == FALSE) {
            redirect('error_page', 'refresh');
        } else {
            $expired = $cek_token->expired_at;
            $datenow = date('Y-m-d H:i:s');
            if ($datenow >= $expired) {
                // update expired
                $id_tokenlama = $cek_token->id;
                $data_update = array(
                    'token_status' => 'EXPIRED',
                    'status_akun' => 'NOT USED'
                );
                $this->db->where('id', $id_tokenlama);
                $this->db->update('users_lupapas', $data_update);
                redirect('error_page', 'refresh');
            } else {
                redirect("change_password?token=$token", 'refresh');
            }
        }
    }
}
