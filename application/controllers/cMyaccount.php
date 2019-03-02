<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cMyaccount extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->model('mOrder','MOrder'); //load model first before view
  }

  public function index()
  {

    $custAddr1  = $this->session->userdata('customerAddr1Sess');
    $custAddr2  = $this->session->userdata('customerAddr2Sess');
    $custCity   = $this->session->userdata('customerCitySess');
    $custState  = $this->session->userdata('customerStateSess');
    $custPostcode = $this->session->userdata('customerPostcodeSess');
    $custCountry  = $this->session->userdata('customerCountrySess');
    $custEmail = $this->session->userdata('customerEmailSess');
    $custTel      = $this->session->userdata('customerTelSess');
    $CustomerID = $this->session->userdata('customerIDSess');

    if ($this->session->has_userdata('PrivilegeID')) {
        $PrivilegeID = $this->session->userdata('PrivilegeID');
    }else {
        $PrivilegeID = '';
    }

    if ($this->session->has_userdata('customerNameSess')) {
        $custname = $this->session->userdata('customerNameSess');
    }else {
        $custname = '';
    }

    if ($this->session->has_userdata('customerLastSess')) {
        $custlast = $this->session->userdata('customerLastSess');
    }else {
        $custlast = '';
    }



    $orderHistory = $this->MOrder->mgetHistory($CustomerID);

    $header = array(
      'title' => 'My Account',
      'keywords' => 'account',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS',
      'custname'=> $custname,
      // 'custlast'  => $custlast,
      'privid' => $PrivilegeID,


    );

    $index = array(
      'top' => 'Home',
      'custname'  => $custname,
      'custlast'  => $custlast,
      'custAddr1' => $custAddr1,
      'custAddr2' => $custAddr2,
      'custCity'  => $custCity,
      'custState' => $custState,
      'custPostcode' => $custPostcode,
      'custCountry' => $custCountry,
      'custEmail' => $custEmail,
      'custTel' => $custTel,
      'orderHistory' => $orderHistory
    );

    $data = array();
    $this->load->view('template/header',$header);
    $this->load->view('vMyaccount',$index); //load view
    $this->load->view('template/footer');

  }
  // public function login(){
  //
  // }

}
?>
