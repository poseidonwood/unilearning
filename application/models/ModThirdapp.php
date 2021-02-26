<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ModThirdapp extends CI_Model
{

  public function sendwa($nomor, $pesan)
  {
    date_default_timezone_set('Asia/Jakarta');
    $date_now = date("Y-m-d H:i:s");
    if ($nomor == null && $pesan == null) {
      $nomor = $this->input->post('nomor');
      $pesan = $this->input->post('pesan');
    }

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://fekusa-wa.herokuapp.com/send-message",
      //   CURLOPT_URL => "http://ngirimwa.com/api/send-message.php",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      //   CURLOPT_POSTFIELDS => array('token'=> $token,'phone' => "$nomor", 'message' => "$pesan"),
      CURLOPT_POSTFIELDS => array('number' => "$nomor", 'message' => "$pesan"),

    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
  }
  public function sendsms($nomor, $pesan)
  {
    date_default_timezone_set('Asia/Jakarta');
    $date_now = date("Y-m-d H:i:s");
    $token = "7ecbd665ae5197caea70084a06ab5369";
    if ($nomor == null && $pesan == null) {
      $nomor = $this->input->post('nomor');
      $pesan = $this->input->post('pesan');
    }

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://smsgateway24.com/getdata/addsms",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => array(
        'token' => $token,
        'sendto' => "+$nomor",
        'body' => $pesan,
        'device_id' => '3035',
        'sim' => 0
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
  }
  public function sendemail($tujuan, $subject, $pesan)
  {
    require APPPATH . 'libraries/phpmailer/src/Exception.php';
    require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
    require APPPATH . 'libraries/phpmailer/src/SMTP.php';
    // PHPMailer object
    $response = false;
    $mail = new PHPMailer();

    // Konfigurasi email
    // $config = [
    //   'mailtype'  => 'html',
    //   'charset'   => 'utf-8',
    //   'protocol'  => 'smtp',
    //   'smtp_host' => 'banjararum.idweb.host',
    //   'smtp_user' => 'no-reply@fekusa.com',  // Email gmail
    //   'smtp_pass'   => 'Putr!123Putr!123',  // Password gmail
    //   'smtp_crypto' => 'ssl',
    //   'smtp_port'   => 465,
    //   'crlf'    => "\r\n",
    //   'newline' => "\r\n"
    // ];
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host     = 'fekusa.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
    $mail->SMTPAuth = true;
    $mail->Username = 'no-reply@fekusa.com'; // user email
    $mail->Password = 'Putr!123Putr!123'; // password email
    $mail->SMTPSecure = 'ssl';
    $mail->Port     = 465;

    $mail->setFrom('no-reply@fekusa.com', 'No-Reply Febri Kukuh Santoso'); // user email
    $mail->addReplyTo('no-reply@fekusa.com', 'No-Reply Febri Kukuh Santoso'); //user email

    // Add a recipient
    $mail->addAddress($tujuan); //email tujuan pengiriman email
    // Bcc
    $mail->addCC('sukmo@skmi.web.id');
    // Email subject
    $mail->Subject = $subject; //subject email

    // Set email format to HTML
    $mail->isHTML(true);

    // Email body content
    $mailContent = $pesan;
    $mailContent .= "<h3>Pesan Otomatis</h3>
                     <p>Email dikirm dari sistem</p>"; // isi email
    $mail->Body = $mailContent;

    // Send email
    if (!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message has been sent';
    }
  }
}

/* End of file Model_db.php */
