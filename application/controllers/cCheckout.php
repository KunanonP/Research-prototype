<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cCheckout extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('cart');
          $this->load->library('session');
          // $this->load->library('paypalexpress');
          $this->load->model('mOrder','MOrder');
          $this->load->helper('url');
  }

  public function index()
  {
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


    $header = array(
      'title' => 'Checkout',
      'keywords' => 'checkout',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS',
      'custname'=> $custname,
      'custlast'  => $custlast,
      'privid' => $PrivilegeID
    );
    $shippingUserID = $this->input->post('custID');
    $shippingFirstname = $this->input->post('sFname');
    $shippingLastname = $this->input->post('sLname');
    $shippingAddr = $this->input->post('sAddr');
    $shippingAddr2 = $this->input->post('sAddr2');
    $shippingCity = $this->input->post('sCity');
    $shippingState = $this->input->post('sState');
    $shippingPostcode = $this->input->post('sPostcode');
    $shippingCountry = $this->input->post('sCountry');
    $shippingEmail = $this->input->post('sEmails');
    $shippingTel = $this->input->post('sTels');

    $address = array( 'shippingUserID' => $shippingUserID,
                      'shippingFirstname' => $shippingFirstname,
                      'shippingLastname' => $shippingLastname,
                      'shippingAddr' => $shippingAddr,
                      'shippingAddr2' => $shippingAddr2,
                      'shippingCity' => $shippingCity,
                      'shippingState' => $shippingState,
                      'shippingPostcode' => $shippingPostcode,
                      'shippingCountry' => $shippingCountry,
                      'shippingEmail' => $shippingEmail,
                      'shippingTel' => $shippingTel,
                      );


    $this->session->set_userdata($address); //store shipping details to session
    $this->load->view('template/header',$header);

    $this->load->view('vCheckout',$address);
    $this->load->view('template/cartfooter');

  }

  // public function saveorder($paymentType){
  //
  //
  //   echo $this->session->userdata('shippingFirstname');
  //
  //
  // }



}
?>
