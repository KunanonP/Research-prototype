<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cCreditcard extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('cart');
          $this->load->library('session');
          // $this->load->library('paypalexpress');
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
      'title' => 'My Account',
      'keywords' => 'account',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS',
      'custname'=> $custname,
      'custlast'  => $custlast,
      'privid' => $PrivilegeID

    );

    $this->load->view('template/header',$header);
    // // $this->load->view('vCart',$index); //load view
    // $cartData = array();
    // $cartData['cartUser'] = $this->MCart->mCartuser();
    $this->load->view('vCreditcard');
    $this->load->view('template/footer');
    // // $pvlList = $this->MCart->mCartuser();
  }


}
?>
