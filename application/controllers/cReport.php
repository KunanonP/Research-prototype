<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cReport extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->model('mUser','MUser'); //load model first before view
          $this->load->model('mOrder','MOrder'); //load model first before view
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

       if (isset($PrivilegeID)){
         if ($PrivilegeID == ''){
            echo "<script>   alert('You are not allowed !'); window.location = 'home'; </script>";
         }else if ($PrivilegeID == '1'){
           echo "<script>   alert('You are not allowed !'); window.location = 'home'; </script>";
         }else{

         }

       }

      $header = array(
        'title' => 'Report',
        'keywords' => 'shopping',
        'description' => 'Userpage',
        'author' => 'Kunanon Pititheerachot #12634123 UTS',
        'custname' => $custname,
        'PrivilegeID'=> $PrivilegeID,
        'privid' => $PrivilegeID
      );

      $pvlList = $this->MUser->mPrivilegeList();
      $orderReport = $this->MOrder->mReport();

      date_default_timezone_set("Australia/Sydney");
      $last2HR = date('Y-m-d H:i:s',strtotime("-2 hours"));
      $cDateTime = date('Y-m-d H:i:s');

      $orderRecently = $this->MOrder->mReportRecently($last2HR,$cDateTime);

      $index = array(
        'top' => 'Order Report',
        'PrivilegeID'=> $PrivilegeID,
        'PrivList' => $pvlList,
        'orderReport' => $orderReport,
        'orderRecently' => $orderRecently
      );

      $this->load->view('template/header',$header); //header
      $this->load->view('vReport',$index); //load view
      $this->load->view('template/footer'); //footer


  }

}
?>
