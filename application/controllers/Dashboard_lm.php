<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_lm extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MLogin');
        if($this->session->userdata('logged_in') !== TRUE){
            $this->session->set_flashdata('error', 'HARAP LOGIN DAHULU');
            redirect('login','refresh');    
          }else{
            $role = $this->session->userdata('role');
            if($role!=='LINE MANAGER' ){
                $session_data = array(
                    'user_id' => $check_login->id,
                    'role' => $check_login->role,
                    'status' => $check_login->status,
                    'logged_in' => TRUE
                );
                
                $this->session->unset_userdata($session_data);
                $this->session->set_flashdata('error', 'AKSES DI TOLAK SILAHKAN LOGIN LAGI');
                redirect('login'); 
            }
        }
    }
    public function index()
    {        
        $this->template->load('layoutlm', 'dashboard/dashboard_lm');
    }
}