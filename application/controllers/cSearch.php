<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

  class cSearch extends CI_Controller {

    function __construct(){
            parent::__construct();
            $this->load->library('session');
            $this->load->library('cart');
            $this->load->helper('url');
            $this->load->model('mProduct','MProduct'); //load model first before view
            $this->load->model('mCatalog','MCatalog'); //load model first before view
            $this->load->model('mRecommend','MRecommend');
    }

    public function index_1(){
      echo 'index';
      $search = $this->input->post('searchProduct');
      echo $search;
    }
  public function index(){
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

          if ($this->session->has_userdata('customerIDSess')) {
              $custID = $this->session->userdata('customerIDSess');
          }else {
              $custID = '';
          }

          $header = array(
            'title' => 'Search',
            'keywords' => 'shopping',
            'description' => 'this is web application for online retailer',
            'author' => 'Kunanon Pititheerachot #12634123 UTS',
            'custname'=> $custname,
            'custlast'=>$custlast,
            'privid' => $PrivilegeID
          );

          $aData = array();

          $search = $this->input->post('searchProduct');       //get post data from view page

          $aCatalog = $this->MCatalog->mSearch($search);
          //echo var_dump($aCatalog);
          $beautyCatalog = $this->MCatalog->mBeautyCatalog();

          $index = array(
            'top' => 'Search',
            'BeautyCatalog' => $beautyCatalog,
            'searchItems' => $aCatalog

          );


         $this->load->view('template/header',$header);
         $this->load->view('vSearch',$index); //load view
         $this->load->view('template/footer');
  }
}
?>
