<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Change_password extends CI_Controller
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
        if ($this->input->get('token') !== null) {
            $token = $this->input->get('token');
            if (!isset($token) || empty($token)) {
                redirect('error_page', 'refresh');
            } else {
                $cek_token = $this->MData->selectsingledatadoblewhere('users_lupapas', array('token' => $token), array('token_status' => 'VALID'));
                if ($cek_token == FALSE) {
                    redirect('error_page', 'refresh');
                } else {
                    $expired = $cek_token->expired_at;
                    $datenow = date('Y-m-d H:i:s');
                    if ($datenow >= $expired) {
                        $id_tokenlama = $cek_token->id;
                        $data_update = array(
                            'token_status' => 'EXPIRED',
                            'status_akun' => 'NOT USED'
                        );
                        $this->db->where('id', $id_tokenlama);
                        $this->db->update('users_lupapas', $data_update);
                        redirect('error_page', 'refresh');
                    } else {
                        $data = array('id' => $cek_token->id_user, 'token' => $token);
                        $this->load->view('login/change_password', $data);
                    }
                }
            }
        } else {
            redirect('error_page', 'refresh');
        }
    }
    public function proses()
    {
        $id = $this->input->post('id');
        $token = $this->input->post('token');
        $password1 = md5($this->input->post('password1'));
        $password2 = md5($this->input->post('password2'));
        if ($password1 !== $password2) {
            $this->session->set_flashdata('alert', 'PASSWORD BARU DAN KONFIRMASI PASSWORD TIDAK SAMA');
            redirect("change_password/?token=$token", 'refresh');
        } else {
            // prosess ubah password
            $data = array(
                'password' => $password1
            );
            $this->db->where('id', $id);
            $this->db->update('users', $data);
            // proses ubah status token
            $data = array(
                'token_status' => 'EXPIRED',
                'status_akun' => 'SUCCESS'
            );
            $this->db->where('token', $token);
            $this->db->update('users_lupapas', $data);
            $this->session->set_flashdata('alert', 'Password berhasil di ubah silahkan coba login kembali!');

            redirect('login', 'refresh');
        }
    }
}
