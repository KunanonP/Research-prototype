<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cRegister extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->helper('url');
          $this->load->model('mRegister','MRegister'); //load model first before view
  }

  public function index()
  {
    if ($this->session->has_userdata('customerNameSess')) {
        $custname = $this->session->userdata('customerNameSess');
    }else {
        $custname = '';
    }

    if ($this->session->has_userdata('PrivilegeID')) {
        $PrivilegeID = $this->session->userdata('PrivilegeID');
    }else {
        $PrivilegeID = '';
    }

    $header = array(
      'title' => 'Register Page',
      'keywords' => 'shopping',
      'description' => 'Register',
      'author' => 'Kunanon Pititheerachot #12634123 UTS',
      'custname' => $custname,
      'PrivilegeID'=> $PrivilegeID,
      'privid' => $PrivilegeID
    );
    $index = array(
      'top' => 'Create Account',
      'topic' => 'Personal Details',
    );

    // $data = array();

    $this->load->view('template/header',$header); //header
    $this->load->view('vRegister',$index); //load view
    $this->load->view('template/footer'); //footer
  }

  public function createUser(){
      //receive parameter from view page
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $firstname = $this->input->post('firstname');       //get post data from view page
      $lastname = $this->input->post('lastname');
      $userdata = array('email' => $email,
                        'password' => $password,
                        'firstname' =>$firstname ,        //store data from view page as array
                        'lastname' => $lastname
                      );
           $res = $this->MRegister->mCreate($userdata);
           echo $res;
  }

}

?>
