<?php defined('BASEPATH') OR exit('No direct script access allowed');
class cMail extends CI_Controller {
         function Email()
         {
             parent::Controller();
             // $this->load->helper('url');
             // $this->load->helper('language');
             $this->load->library('email');
         }
        //  public function __construct(){
        //         parent::__construct();
        //         $this->load->library('email');
        //  }

         function FSnSentMail(){
                $tEmail = 'zindybiteme@gmail.com';
                $tData  = 'Test Send Email';

                 $config = Array(
                     'protocol' => 'smtp',
                     'smtp_host' => 'ssl://smtp.googlemail.com',
                     'smtp_port' => 465,
                     'smtp_user' => 'k.pititheerachot@gmail.com',
                     'smtp_pass' => 'loikderf7968',
                     'mailtype'  => 'html',
                     'charset'   => 'utf-8'
                 );
                 $this->load->library('email', $config);
                 $this->email->set_newline("\r\n");

                 // Set to, from, message, etc.
                 $this->email->from('k.pititheerachot@gmail.com', 'Admin');
                 $this->email->to($tEmail);

                 $this->email->subject('test from ci');
                 $this->email->message($tData);

                 $result = $this->email->send();
                  // var_dump($result);
                 return $result;

          }
}

 ?>
