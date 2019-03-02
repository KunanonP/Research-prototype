<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cLogout extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->model('mUser','MUser'); //load model first before view
  }

  public function index()
  {
    // $header = array(
    //   'title' => 'Userpage',
    //   'keywords' => 'shopping',
    //   'description' => 'Userpage',
    //   'author' => 'Kunanon Pititheerachot #12634123 UTS',
    // );

    $this->session->sess_destroy();
    $this->session->unset_userdata('customerNameSess');
    //$this->load->controller('cHome');
    // $this->load->view('template/header',$header);
    // $this->load->view('vLogout',$header);
    // $this->load->view('template/footer');
    echo "<script> window.location = 'home';</script>";
  }
}
?>
