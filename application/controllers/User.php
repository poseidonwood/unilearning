<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class User extends CI_Controller
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
        $this->load->model('MLogger');
        $this->load->library('Excel');
    }

    public function index()
    {
        $data = array(
            // 'departmentdata' => $this->MData->selectdataglobal2('karyawan_department'),
            // 'linemanagerdata' => $this->MData->selectdata('karyawan', array('department' => 'LM')),
            // 'datakaryawan' => $this->MData->selectdataglobal2('karyawan'),
            // 'datauser' => $this->MData->selectdataglobal('users'),
            // 'cekakun' => $this->MData->InnerJoinWhere('users', 'karyawan', 'employee_id', array('users.password !=' => NULL))
            'departmentdata' => $this->MData->selectdataglobal2('karyawan_department'),
            'linemanagerdata' => $this->MData->selectdata('karyawan_revisi', array('department' => 'LM')),
            'datakaryawan' => $this->MData->selectdataglobal2('karyawan_revisi'),
            'datauser' => $this->MData->selectdataglobal('users'),
            'cekakun' => $this->MData->InnerJoinWhere('users', 'karyawan_revisi', 'employee_id', array('users.password !=' => NULL))

        );
        $this->template->load('layout', 'users/user', $data);
    }
    public function search()
    {
        if ($this->input->post('employee_id') !== null) {
            $select = $this->MData->selectsingledata('karyawan_revisi', array('employee_id' => $this->input->post('nip')));
            if ($select == true) {
                $nama = $select->nama;
                $select_user = $this->MData->selectsingledata('users', array('employee_id' => $this->input->post('nip')));
                if ($select_user == FALSE) {
                    echo json_encode(array(
                        'email' => $select->email,
                        'message' => "<p><span class='badge badge-pill badge-success'> Belum ada akun usernya. Silahkan tambah akun user : <b>" . $nama . "</b></span></p>",
                        'result' => TRUE
                    ));
                } else {
                    echo json_encode(array(
                        'message' => "<p><span class='badge badge-pill badge-danger'> <b>" . $nama . "</b> Sudah terdaftar di user list</span></p>",
                        'result' => FALSE
                    ));
                }
            } else {
                echo json_encode(array(
                    'message' => "<p><span class='badge badge-pill badge-danger'> Data NIP : <b>" . $this->input->post('nip') . "</b> tidak ada di daftar karyawan</span></p>",
                    'result' => FALSE
                ));
            }
        } else {
            echo json_encode(array(
                'message' => 'Access Denied',
                'result' => FALSE
            ));
        }
    }

    public function proses()
    {
        $password1 = ($this->input->post('password1'));
        $password2 = ($this->input->post('password2'));
        if ($password1 !== $password2) {
            $this->session->set_flashdata('notif', $this->MNotif->alertfail('Data gagal di proses , Password dan Confirm Password tidak sama.'));
            redirect('user', 'refresh');
        } else {
            $nip = $this->input->post('nip');
            $data = array(
                'id' => null,
                'employee_id' => $nip,
                'email' => $this->input->post('email'),
                'password' => md5($password1),
                'role' => $this->input->post('role_users'),
                'status' => $this->input->post('status'),
                'tanggal_terbit' => date('Y-m-d H:i:s')
            );
            $save = $this->MData->tambah('users', $data);
            if ($save == true) {
                // Search DATA KARYAWAN , 
                $ceknip = $this->MData->selectdatawhere('karyawan_revisi', array('employee_id' => $nip));
                if ($ceknip !== FALSE) {
                    $nama = $ceknip->nama;
                    $phone = $ceknip->telepon;
                    $email = $ceknip->email;
                    $password = $password1;
                    $message = "Hai $nama,\n\nAkun anda berhasil di daftar kan ke E-LEARNING UNILEVER.\nSilahkan login ke " . base_url() . " dan masukkan data NIP anda dengan password anda : *$password* \n\n\nTerimakasih.\n TEAM E-LEARNING UNILEVER.";
                    $subject = "User List";
                }

                // Send Notif
                // $this->ModThirdapp->sendwa($phone, $message);
                $this->ModThirdapp->sendemail($email, '', $message);
                $this->ModThirdapp->sendsms($phone, $message);

                $this->session->set_flashdata('notif', $this->MNotif->alertsuccess('Data berhasil di simpan.'));
                redirect('user', 'refresh');
            } else {
                $this->session->set_flashdata('notif', $this->MNotif->alertfail('Data gagal di proses.'));
                redirect('user', 'refresh');
            }
        }
    }
    public function delete()
    {
        if ($this->input->post('id') !== null) {
            $delete = $this->MData->delete('users', array('id' => $this->input->post('id')));
            if ($delete == true) {
                echo json_encode(array('message' => 'Delete Success', 'url' => '/user'));
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
            $select = $this->MData->selectsingledata('users', array('id' => $this->input->post('id')));
            if ($select == true) {
                $data = array(
                    "id" => $select->id,
                    'employee_id' => $select->nip,
                    "email" => $select->email,
                    "role" => $select->role,
                    "status" => $select->status
                );
                echo json_encode($data, true);
            } else {
                echo json_encode(array('message' => 'Fail'));
            }
        } else {
            echo json_encode(array('message' => 'Access Denied'));
        }
    }
    public function edit()
    {
        if ($this->input->post('id_users') !== null) {
            if ($this->input->post('role') == "LINEMANAGER") {
                $role = "LINE MANAGER";
            } else {
                $role = $this->input->post('role');
            }
            $data = array(
                'role' => $role,
                'status' => $this->input->post('status')
            );
            $update = $this->MData->edit(array('id' => $this->input->post('id_users')), 'users', $data);
            if ($update == true) {
                $this->session->set_flashdata('notif', $this->MNotif->alertsuccess('Data berhasil di update'));
                redirect('user', 'refresh');
            } else {
                echo json_encode(array('message' => 'failed update data'));
            }
        } else {
            echo json_encode(array('message' => 'Access Denied!'));
        }
    }
    // Karyawan Part
    public function addKaryawan()
    {
        $linemanager = $this->input->post('linemanager');
        $location = $this->input->post('location');
        $department = $this->input->post('department');

        if ($linemanager == "0" || $location == "0" || $department == "0") {
            $this->session->set_flashdata('notif', $this->MNotif->alertfail('Pastikan InputData Department,Location,dan Line Manager sudah diisi!'));
            redirect('user', 'refresh');
        } else {
            // $new_name                   = date('YmdHis') . $_FILES["profile"]['name'];
            // $config['file_name']        = $new_name;
            $config['upload_path']          = './assets/img/user';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']             = 2048;
            $config['encrypt_name'] = TRUE;
            // $config['max_width']            = 1366;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('profile')) {
                // if ($this->upload->display_errors() == "You did not select a file to upload.") {
                $data = array(
                    'employee_id' => $this->input->post('nip'),
                    'nama' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'telepon' => $this->input->post('telepon'),
                    'department' => $this->input->post('department'),
                    'linemanager' => $this->input->post('linemanager'),
                    'location' => $this->input->post('location'),
                    'photo' => "defaultuser.jpg",
                    'created_at' => date('Y-m-d H:i:s'),
                    'update_at' => "0000-00-00 00:00:00",
                    'status' => "aktif"
                );
                $save = $this->MData->tambah('karyawan_revisi', $data);
                if ($save == true) {
                    // // Search DATA KARYAWAN , 
                    // $ceknip = $this->MData->selectdatawhere('karyawan', array('employee_id' => $nip));
                    // if ($ceknip !== FALSE) {
                    //     $nama = $ceknip->nama;
                    //     $phone = $ceknip->telepon;
                    //     $email = $ceknip->email;
                    //     $password = $password1;
                    //     $message = "Hai $nama,\n\nAkun anda berhasil di daftar kan ke E-LEARNING UNILEVER.\nSilahkan login ke " . base_url() . " dan masukkan data NIP anda dengan password anda : *$password* \n\n\nTerimakasih.\n TEAM E-LEARNING UNILEVER.";
                    //     $subject = "User List";
                    // }

                    // // Send Notif
                    // $this->ModThirdapp->sendwa($phone, $message);
                    // $this->ModThirdapp->sendemail($email, '', $message);
                    $this->session->set_flashdata('notif', $this->MNotif->alertsuccess('Data berhasil di simpan.'));
                    redirect('user', 'refresh');
                } else {
                    $this->session->set_flashdata('notif', $this->MNotif->alertfail('Data gagal di proses.'));
                    redirect('user', 'refresh');
                }
                // } else {
                //     $this->session->set_flashdata('notif', $this->MNotif->alertfail($this->upload->display_errors()));
                //     redirect('user', 'refresh');
                // }
            } else {
                $upload_data = $this->upload->data();
                $data = array(
                    'employee_id' => $this->input->post('nip'),
                    'nama' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'telepon' => $this->input->post('telepon'),
                    'department' => $this->input->post('department'),
                    'linemanager' => $this->input->post('linemanager'),
                    'location' => $this->input->post('location'),
                    'photo' => $upload_data['file_name'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'update_at' => "0000-00-00 00:00:00",
                    'status' => "aktif"
                );
                $save = $this->MData->tambah('karyawan_revisi', $data);
                if ($save == true) {
                    $this->session->set_flashdata('notif', $this->MNotif->alertsuccess('Data berhasil di simpan.'));
                    redirect('user', 'refresh');
                } else {
                    $this->session->set_flashdata('notif', $this->MNotif->alertfail('Data gagal di proses.'));
                    redirect('user', 'refresh');
                }
            }
        }
    }

    public function deleteKaryawan()
    {
        if ($this->input->post('id') !== null) {
            $delete = $this->MData->delete('karyawan_revisi', array('employee_id' => $this->input->post('id')));
            if ($delete == true) {
                $this->MData->delete('users', array('employee_id' => $this->input->post('id')));
                echo json_encode(array('message' => 'Delete Success', 'url' => '/user'));
            } else {
                echo json_encode(array('message' => 'Delete Fail'));
            }
        } else {
            echo json_encode(array('message' => 'Access Denied'));
        }
    }
    public function dataeditKaryawan()
    {
        if ($this->input->post('id') !== null) {
            $select = $this->MData->selectsingledata('karyawan_revisi', array('employee_id' => $this->input->post('id')));
            if ($select == true) {
                $data = array(
                    'employee_id' => $select->nip,
                    "nama" => $select->nama,
                    "email" => $select->email,
                    "telepon" => $select->telepon,
                    "department" => $select->department,
                    "linemanager" => $select->linemanager,
                    "location" => $select->location,
                    "photo" => $select->photo,
                    "status" => $select->status

                );
                echo json_encode($data, true);
            } else {
                echo json_encode(array('message' => 'Fail'));
            }
        } else {
            echo json_encode(array('message' => 'Access Denied'));
        }
    }
    public function editKaryawan()
    {
        $nip =  $this->input->post('nip');
        // $new_name                   = date('YmdHis') . $_FILES["profile"]['name'];
        // $config['file_name']        = $new_name;
        $config['upload_path']          = './assets/img/user';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
        $config['max_size']             = 2048;
        $config['encrypt_name'] = TRUE;
        // $config['max_width']            = 1366;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('profile')) {
            // kode// nip//no_certificate//no_lisensi//nama_certificate//pic//provider//tanggal_terbit//tanggal_expired//note//files
            $upload_data = $this->upload->data();
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'department' => $this->input->post('department'),
                'linemanager' => $this->input->post('linemanager'),
                'location' => $this->input->post('location'),
                'photo' => $upload_data['file_name'],
                'update_at' => date('Y-m-d H:i:s'),
                'status' => $this->input->post('status_karyawan')

            );
            $update = $this->MData->edit(array('employee_id' => $nip), 'karyawan_revisi', $data);
            if ($update == true) {
                $this->session->set_flashdata('notif', $this->MNotif->alertsuccess("Data berhasil di update"));
                redirect('user', 'refresh');
            } else {
                echo json_encode(array('message' => 'failed update data'));
            }
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'department' => $this->input->post('department'),
                'linemanager' => $this->input->post('linemanager'),
                'location' => $this->input->post('location'),
                'update_at' => date('Y-m-d H:i:s'),
                'status' => $this->input->post('status_karyawan')
            );

            $update = $this->MData->edit(array('employee_id' => $nip), 'karyawan_revisi', $data);
            if ($update == true) {
                $this->session->set_flashdata('notif', $this->MNotif->alertsuccess("Data berhasil di update "));
                redirect('user', 'refresh');
            } else {
                echo json_encode(array('message' => 'failed update data'));
            }
        }
    }
    // End Karyawan Part
    public function test()
    {
        $ceknip = $this->MData->selectdatawhere('karyawan', array('employee_id' => '5555'));
        if ($ceknip !== FALSE) {
            $nama = $ceknip->nama;
            $phone = $ceknip->telepon;
            $email = $ceknip->email;
            $password = "ASD";
            $domain = base_url();
            $format = array(
                '{{nama}}' => $nama,
                '{{domain}}' => $domain,
                '{{password}}' => $password
            );
        }

        $ceknip = $this->MData->selectdatawhere('message_format', array('fungsi' => 'email'));
        $message = strtr($ceknip->message, $format);
        echo $message;
        $this->ModThirdapp->sendwa($phone, $message);
        $this->ModThirdapp->sendemail($email, $email, $message);
    }
    public function import()
    {
        $fileName = date('YmdHis') . "-" . $_FILES['excelimport']['name'];

        $config['upload_path'] = './assets/excel'; //path upload
        $config['file_name'] = $fileName;  // nama file
        $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['max_size'] = 10000; // maksimal sizze

        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('excelimport')) {
            echo $this->upload->display_errors();
            exit();
        }

        $inputFileName = './assets/excel/' . $fileName;

        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            $error_message = 'Error Upload Excel loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage();
            $this->MLogger->logger_error($error_message);
            die($error_message);
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        for ($row = 2; $row <= $highestRow; $row++) {
            $rowData = $sheet->rangeToArray(
                'A' . $row . ':' . $highestColumn . $row,
                NULL,
                TRUE,
                FALSE
            );
            // Validasi apakah id tersebut sudah terdaftar
            $cekdata = $this->MData->selectdatawhere('karyawan_revisi', array('employee_id' => $rowData[0][0]));
            $cekdatauser = $this->MData->selectdatawhere('users', array('employee_id' => $rowData[0][0]));

            if ($cekdata == FALSE) {
                if ($rowData[0][1] == "" || $rowData[0][1] == null) {
                    $image = "defaultuser.jpg";
                } else {
                    $image = $rowData[0][1];
                }
                if ($rowData[0][5] == "" || $rowData[0][5] == null) {
                    $linemanager = "0000000";
                } else {
                    $linemanager = $rowData[0][5];
                }

                // Sesuaikan key array dengan nama kolom di database                                                         
                $data = array(
                    "employee_id" => $rowData[0][0],
                    "image" => $image,
                    "employee_name" => $rowData[0][2],
                    "business_title" => $rowData[0][3],
                    "department" => $rowData[0][4],
                    "linemanager" => $linemanager,
                    "linemanager_name" => $rowData[0][6],
                    "factory" => $rowData[0][7],
                    "email" => $rowData[0][8],
                    "telepon" => $rowData[0][9],
                    "created_at" => date('Y-m-d H:i:s'),
                    "update_at" => '0000-00-00 00:00',
                    'status' => 'active'
                );
                $insert = $this->db->insert("karyawan_revisi", $data);
                if ($insert == false) {
                    // $this->db->truncate('e_certificate_revisi');
                    $this->session->set_flashdata('notif', $this->MNotif->alertfail('Cek data anda , GAGAL DI UPLOAD'));
                    redirect('user', 'refresh');
                }
                if ($cekdatauser == FALSE) {
                    $data_user =  array(
                        "id" => null,
                        'employee_id' => $rowData[0][0],
                        "email" => $rowData[0][8],
                        "password" => md5("UNILEARNING" . $rowData[0][0]),
                        "role" => "KARYAWAN",
                        "status" => "aktif",
                        "tanggal_terbit" => date('Y-m-d H:i:s')
                    );
                    $this->db->insert("users", $data_user);
                }
            } else {
                if ($cekdatauser == FALSE) {
                    $data_user =  array(
                        "id" => null,
                        'employee_id' => $rowData[0][0],
                        "email" => $rowData[0][8],
                        "password" => md5("UNILEARNING" . $rowData[0][0]),
                        "role" => "KARYAWAN",
                        "status" => "aktif",
                        "tanggal_terbit" => date('Y-m-d H:i:s')
                    );
                    $this->db->insert("users", $data_user);
                }
            }
        }
        $this->session->set_flashdata('notif', $this->MNotif->alertsuccess("Data berhasil di upload"));
        redirect('user', 'refresh');
    }
}
