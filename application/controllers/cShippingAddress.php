<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cShippingAddress extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('cart');
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->model('mCart','MCart'); //load model first before view
  }

  public function index()
  {
        $custID     = $this->session->userdata('customerIDSess');
        $custAddr1  = $this->session->userdata('customerAddr1Sess');
        $custAddr2  = $this->session->userdata('customerAddr2Sess');
        $custCity   = $this->session->userdata('customerCitySess');
        $custState  = $this->session->userdata('customerStateSess');
        $custPostcode = $this->session->userdata('customerPostcodeSess');
        $custCountry  = $this->session->userdata('customerCountrySess');
        $custEmail = $this->session->userdata('customerEmailSess');
        $custTel      = $this->session->userdata('customerTelSess');

        $csrf = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
        );

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

    if ($this->session->has_userdata('PrivilegeID')) {
        $PrivilegeID = $this->session->userdata('PrivilegeID');
    }else {
        $PrivilegeID = '';
    }

    $csrf = array(
         'name' => $this->security->get_csrf_token_name(),
         'hash' => $this->security->get_csrf_hash()
        //  'csrf' => $csrf
     );

    $header = array(
      'title' => 'Shipping',
      'keywords' => 'shipping',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS',
      'custname'=> $custname,
      'custlast'  => $custlast,
      'privid' => $PrivilegeID,
      'csrf' => $csrf

    );

    $index = array(
      'top' => 'Home',
      'custID'    => $custID,
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
      'csrf' => $csrf
    );

    $this->load->view('template/header',$header);
    $this->load->view('vShippingAddress',$index);
    $this->load->view('template/footer');
  }

  public function shippingAddress(){

  }

}
?>
