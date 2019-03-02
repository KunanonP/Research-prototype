<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cCatalog_Detail extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->library('cart');
          $this->load->helper('url');
          $this->load->model('mProduct','MProduct'); //load model first before view
          $this->load->model('mCatalog','MCatalog'); //load model first before view
  }

  public function index($productID)
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

    $header = array(
      'title' => 'Product',
      'keywords' => 'shopping',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS',
      'custname'=> $custname,
      'custlast'=>$custlast,
      'privid' => $PrivilegeID

    );
    $aCatalog = $this->MCatalog->mBeautyCatalog();
    $aProRate = $this->MProduct->mProRate($productID);

    // if (is_array($aProRate)){
    //     $i = 0;
    //     $arrayGroup = array();
    //     foreach ($aProRate as $usergroup ) {
    //           $arrayGroup[$i]  = $usergroup->UserID;
    //           $i++;
    //     }
    //
    //     $tgroupUser = implode("','", $arrayGroup);
    //     $groupUser = "'".$tgroupUser."'";
    //
    // }else{
    //     $groupUser = '';
    // }

    // echo $groupUser;
    // $aUserRate = $this->MProduct->mUserRate($groupUser);
    // echo $aUserRate;
    $this->load->view('template/productHeader',$header);
    $arrayProduct = array('Catalog'=>$aCatalog,
                          'ProdRate' => $aProRate,
                          // 'UserRate' => $aUserRate
                          );
    $arrayProduct['ProductDetail'] = $this->MProduct->mProDetail($productID);
    $this->load->view('vCatalog_Detail',$arrayProduct);
    $this->load->view('template/cartfooter');
  }

}
?>
