<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Telegram extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('user_agent');
    $this->load->model('MData');
    $this->load->model('MLogin');
    $this->load->helper('file');
  }

  public function index()
  {
    $TOKEN = "1665138281:AAHgxLraHs8NemcaLgra7B4eRXPMN5swfS4";
    $apiURL = "https://api.telegram.org/bot$TOKEN";
    $update = json_decode(file_get_contents("php://input"), TRUE);
    $chatID = $update["message"]["chat"]["id"];
    $message = $update["message"]["text"];
    $name  = $update['message']['chat']['username'];
    $username = $update["message"]["chat"]["username"];
    $first_name = $update["message"]["chat"]["first_name"];
    $last_name = $update["message"]["chat"]["last_name"];

    if (strpos($message, "/start") === 0) {
      $text = $this->flash_encode(json_encode($update, true));
      file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=$text&parse_mode=HTML");
    } elseif (strpos($message, "/ceklog") === 0) {
      // 
      $ceklog = $this->MData->selectlog('users_loglogin');
      if (is_array($ceklog) || is_object($ceklog)) {
        foreach ($ceklog as $log) {

          $id_user = $log->id_user;
          $email = $log->email;
          $start_login = $log->start_login;
          $device = $log->device;
          $status = $log->status;
          $link = $log->map;
          $text1 = "
NIP : $id_user
EMAIL : $email
START LOGIN : $start_login
DEVICE : $device
STATUS : $status
POSISI : $link";
          $text_json[] = $log;
          $jsondecode = $link;
          $textsend = $this->flash_encode($text1);
          file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=" . $textsend . "&parse_mode=HTML");
        }
      }
      // $jsondecode = json_encode($text_json);
      // $text = $this->flash_encode($jsondecode['id_user']);
      // file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=" . urlencode($text_json) . "&parse_mode=HTML");

      // json_encode($logdata, true);
    } elseif (strpos($message, "/url") === 0) {
      $text = $this->flash_encode(base_url());
      file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=$text&parse_mode=HTML");


      // Non Menu
    } elseif (strpos($message, "/getphoto") === 0) {
      $getphoto = json_decode(file_get_contents("https://api.telegram.org/bot1665138281:AAHgxLraHs8NemcaLgra7B4eRXPMN5swfS4/getUserProfilePhotos?user_id=" . $update['message']['chat']['id'] . ""), true);
      $chat_id = $chatID;
      $file = $getphoto['result']['photos'][0][0]['file_id'];
      $this->sendphoto($chat_id, $file);
    } elseif (strpos($message, "/nulis") !== false) {
      $nulis = str_replace('/nulis ', '', $message);
      $result_nulis = $this->nulis(urlencode($nulis));
      $this->sendphoto($chatID, $result_nulis);
      // $this->sendmessage($chatID, $result_nulis);


      // End NON Menu
    } else {
      if ($update['message']['text'] == true) {
        file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=" . urlencode(($update['message']['text'])) . "&parse_mode=HTML");
      } else if ($update['message']['sticker'] == true) {
        $file_id = $update['message']['sticker']['file_id'];
        $this->sendsticker($chatID, $file_id);
        // file_get_contents($apiURL . "/sendsticker?chat_id=" . $chatID . "&sticker=" . urlencode(($update['message']['sticker']['file_id'])) . "&parse_mode=HTML");
      } else if ($update['message']['video'] == true) {
        $file_id = $update['message']['video']['file_id'];
        $this->sendvideo($chatID, $file_id);
      } else if ($update['message']['voice'] == true) {
        $file_id = $update['message']['voice']['file_id'];
        $this->sendvoice($chatID, $file_id);
      } else if ($update['message']['photo'] == true) {
        $file_id = $update['message']['photo'][0]['file_id'];
        $this->sendphoto($chatID, $file_id);
      }
    }
  }
  // Modul 
  public function sendmessage($chatid = null, $text = null)
  {
    $url = 'https://api.telegram.org/bot1665138281:AAHgxLraHs8NemcaLgra7B4eRXPMN5swfS4/sendmessage';
    $param = array('chat_id' => $chatid, 'text' => $text);
    // $param = array('chat_id' => $chat_id, 'text' => $file);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    return curl_exec($ch);
    curl_close($ch);
  }

  public function sendsticker($chatid = null, $file = null)
  {
    $url = 'https://api.telegram.org/bot1665138281:AAHgxLraHs8NemcaLgra7B4eRXPMN5swfS4/sendsticker';
    $param = array('chat_id' => $chatid, 'sticker' => $file);
    // $param = array('chat_id' => $chat_id, 'text' => $file);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    return curl_exec($ch);
    curl_close($ch);
  }
  public function sendphoto($chat_id = null, $file = null)
  {
    $url = 'https://api.telegram.org/bot1665138281:AAHgxLraHs8NemcaLgra7B4eRXPMN5swfS4/sendPhoto';
    $param = array('chat_id' => $chat_id, 'caption' => 'Sending image', 'photo' => $file);
    // $param = array('chat_id' => $chat_id, 'text' => $file);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    return curl_exec($ch);
    curl_close($ch);
  }
  public function sendvoice($chat_id = null, $file = null)
  {
    $url = 'https://api.telegram.org/bot1665138281:AAHgxLraHs8NemcaLgra7B4eRXPMN5swfS4/sendVoice';
    $param = array('chat_id' => $chat_id, 'voice' => $file);
    // $param = array('chat_id' => $chat_id, 'text' => $file);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    return curl_exec($ch);
    curl_close($ch);
  }
  public function sendvideo($chat_id = null, $file = null)
  {
    $url = 'https://api.telegram.org/bot1665138281:AAHgxLraHs8NemcaLgra7B4eRXPMN5swfS4/sendVideo';
    $param = array('chat_id' => $chat_id, 'video' => $file);
    // $param = array('chat_id' => $chat_id, 'text' => $file);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    return curl_exec($ch);
    curl_close($ch);
  }


  // end modul


  // Modul Game
  public function nulis($value)
  {

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://tools.zone-xsec.com/api/nulis.php?q=$value",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $get =  json_decode($response);
    return $get->image;
  }




  // 
  public function flash_encode($string)
  {
    $string = rawurlencode(utf8_encode($string));

    $string = str_replace("%C2%96", "-", $string);
    $string = str_replace("%C2%91", "%27", $string);
    $string = str_replace("%C2%92", "%27", $string);
    $string = str_replace("%C2%82", "%27", $string);
    $string = str_replace("%C2%93", "%22", $string);
    $string = str_replace("%C2%94", "%22", $string);
    $string = str_replace("%C2%84", "%22", $string);
    $string = str_replace("%C2%8B", "%C2%AB", $string);
    $string = str_replace("%C2%9B", "%C2%BB", $string);

    return $string;
  }
}
