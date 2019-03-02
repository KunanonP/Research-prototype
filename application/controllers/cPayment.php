<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cPayment extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('cart');
          $this->load->library('session');
          $this->load->model('mOrder','MOrder');
          $this->load->helper('url');
          // // $this->load->library('paypalexpress');
          // $this->load->helper('url');
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
    $this->load->view('vPayment');
    $this->load->view('template/footer');
    // // $pvlList = $this->MCart->mCartuser();
  }


  public function paymentCreditcard(){

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
    $custID    = $this->session->userdata('customerIDSess');

    $aData = array('custID'    => $custID, );



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
    $this->load->view('vCreditcard',$aData);
    $this->load->view('template/footer');
  }

  public function receipt($paymentType){

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
    $custID    = $this->session->userdata('customerIDSess');
    $shippingUserID     = $this->session->userdata('shippingUserID');
    $shippingFirstname  = $this->session->userdata('shippingFirstname');
    $shippingLastname   = $this->session->userdata('shippingLastname');
    $shippingAddr  = $this->session->userdata('shippingAddr');
    $shippingAddr2  = $this->session->userdata('shippingAddr2');
    $shippingCity   = $this->session->userdata('shippingCity');
    $shippingState  = $this->session->userdata('shippingState');
    $shippingPostcode = $this->session->userdata('shippingPostcode');
    $shippingCountry  = $this->session->userdata('shippingCountry');
    $shippingEmail = $this->session->userdata('shippingEmail');
    $shippingTel      = $this->session->userdata('shippingTel');
    $LastOrderID      = $this->session->userdata('LastOrder');

    $cAmount = $this->input->post('cAmount');
    $cName = $this->input->post('cName');
    $cNum  = $this->input->post('cNum');
    $cName = $this->input->post('cName');
    $cName = $this->input->post('cName');

    $lastOrder =  $this->MOrder->mgetLastOrder($LastOrderID);
    $lastPayment =  $this->MOrder->mgetLastPayment($LastOrderID);

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
                      'paymentType' => $paymentType,
                      'lastOrder' =>  $lastOrder,
                      'lastPayment' => $lastPayment
                      );
    // $aData = array('custID'    => $custID);


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
    $this->load->view('vReceipt',$address);
    $this->load->view('template/cartfooter');
  }


  public function paymentPaypal(){
    if ($this->session->has_userdata('customerNameSess')) {
        $custname = $this->session->userdata('customerNameSess');
    }else {
        $custname = '';
    }
    $settings = array('api_username' => 'zindybiteme-facilitator_api1.gmail.com',
              'api_password' => 'Y6YHNK6X24VAR3LQ',
              'api_signature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31ADkvn-Hn.a5J6n5eQ34aD.fGBxeg',
              'api_endpoint' => 'https://api-3t.sandbox.paypal.com/nvp',
              'api_url' => 'https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&token=',
              'api_version' => '65.1',
              'payment_type' => 'Sale',
              'currency' => 'AUD'
              );
    $this->load->library('paypalexpress', $settings);
    if(!isset($_GET['token'])) {
        // Setting up your intial variable to send payment process.
        $url = dirname('http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI']);
        $personName  = $this->session->userdata($custname);
        $L_NAME0   = $this->session->userdata($custname);
        $L_AMT0  = $this->cart->total();
        $L_QTY0  =	'1';
        $returnURL = urlencode($url.'/cpaypal');
        $cancelURL = urlencode("$url/cpaypal");
        $itemamt = 0.00;
        $itemamt = $L_QTY0*$L_AMT0;
        $amt = $this->cart->total();
        $nvpstr = "&L_NAME0=".$L_NAME0."&L_AMT0=".$L_AMT0."&L_QTY0=".$L_QTY0."&AMT=".(string)$amt."&ITEMAMT=".(string)$itemamt."&L_NUMBER0=1000&L_DESC0=Size: 8.8-oz&ReturnUrl=".$returnURL."&CANCELURL=".$cancelURL ."&CURRENCYCODE=".$settings['currency']."&PAYMENTACTION=".$settings['payment_type'];
        // calling initial api.
        $initresult = $this->paypalexpress->process_payment($nvpstr);
        if(isset($initresult) && $initresult['ACK'] == 'Failure') {
          // redirect to view with error message.
          $this->session->set_flashdata('error_message', 'Please check your details and try again');
          redirect('myview1');
        }
    }else{
      $token = urlencode($_GET['token']);
      $result = $this->paypalexpress->make_payment($token);
      if(isset($result) && $result['ACK'] == 'Failure') {
        // redirect to view with error message.
        $this->session->set_flashdata('error_message', 'Please check your details and try again');
        redirect('myview');
      }else{
         // Do your stuff with success result.
         redirect('saveorder2/2');
       }
    }
  }



}
?>
