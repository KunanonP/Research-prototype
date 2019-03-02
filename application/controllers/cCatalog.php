<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cCatalog extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->model('mCatalog','MCatalog'); //load model first before view
          

  }

  public function index()
  {
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


    $csrf = array(
         'name' => $this->security->get_csrf_token_name(),
         'hash' => $this->security->get_csrf_hash()
        //  'csrf' => $csrf
     );


    $header = array(
      'title' => 'Catalog',
      'keywords' => 'shopping',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS',
      'custname'=> $custname,
      'custlast'=>$custlast,
      'csrf' => $csrf
    );

    $aCatalog = $this->MCatalog->mCatalogList();

    $index = array(
      'top' => 'Catalog',
      'Catalog' => $aCatalog,

    );



    $data = array();
    $this->load->view('template/header',$header);
    $this->load->view('vCatalog',$index); //load view
    $this->load->view('template/footer');

  }
  // public function login(){
  //
  // }

}
?>
