<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cLogin extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->model('mLogin','MLogin'); //load model first before view
          // $this->load->library('encryption');
  }

  public function index()
  {
    $header = array(
      'title' => 'Login',
      'keywords' => 'shopping',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS'
    );

    $index = array(
      'top' => 'Home'
    );

    $data = array();
    $this->load->view('template/header',$header);
    $this->load->view('vLogscreen',$index); //load view
    $this->load->view('template/footer');

  }
  public function signIn()
  {


            $username   =     $this->input->post('username');
            $password   =     $this->input->post('password');


            $pwE = md5($password);
            $csinfo = $this->MLogin->Login($username,$pwE);

            if ($csinfo == 'empty') {
              echo 'false';
            }else{
              echo $csinfo->PrivilegeID;

              $cusdata = array( 'customerIDSess'   =>   $csinfo->CustomerID,
                                'customerNameSess' =>   $csinfo->CustomerFirstname,
                                'customerLastSess' =>   $csinfo->CustomerLastname,
                                'PrivilegeID'      =>   $csinfo->PrivilegeID,
                                'usernameSess'     =>   $csinfo->Username,
                                'customerAddr1Sess'=>   $csinfo->CustomerAddr1,
                                'customerAddr2Sess'=>   $csinfo->CustomerAddr2,
                                'customerCitySess' =>   $csinfo->City,
                                'customerStateSess'=>   $csinfo->State,
                                'customerPostcodeSess'=>  $csinfo->Postcode,
                                'customerCountrySess' => $csinfo->Country,
                                'customerTelSess'  =>   $csinfo->CustomerTel,
                                'customerEmailSess'=>   $csinfo->Email
                              );

                $this->session->set_userdata($cusdata);
          //       redirect('#',refresh);
            }


       //
      //  echo  $this->log_info();
  }
  public function log_info(){
          return $this->session->userdata('username_sess');
  }


    // public function validate(){
      // $this->load->helper(array('form', 'url'));
      // $this->load->library('form_validation');
      //
      // if ($this->form_validation->run() == FALSE)
      // {
      //         $this->load->view('myform');
      // }
      // else
      // {
      //         $this->load->view('formsuccess');
      // }
    // }

}
?>
