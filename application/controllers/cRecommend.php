<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cRecommend extends CI_Controller {

  function __construct(){
          parent::__construct();
          // $this->load->library('cart');
           $this->load->library('session');
          // $this->load->helper('url');
           $this->load->model('mRecommend','MRecommend'); //load model first before view
          // $this->load->helper('form');
  }

  public function index(){
    // $this->load->view('tempalte/header');

        if ($this->session->has_userdata('customerIDSess')) {
            $custID = $this->session->userdata('customerIDSess');
        }else {
            $custID = '';
        }



    $oGroupRecommend = $this->MRecommend->getGruopRecommend($custID);

    if (is_array($oGroupRecommend)){
        $i = 0;
        $arrayGroup = array();
        foreach ($oGroupRecommend as $group ) {
              $arrayGroup[$i]  = $group->CategoryID;
              $i++;
        }

        $tgroupRecommend = implode("','", $arrayGroup);
        $groupRecommend = "'".$tgroupRecommend."'";

    }else{
        $groupRecommend = 'ALL';
    }

    $productRecommend = $this->MRecommend->mRecommendation($groupRecommend);
    // echo "<pre>";
    // var_dump($productRecommend);
    // echo "</pre>";

    $this->load->view('vRecommend',$productRecommend);
    // $this->load->view('vRecommend');
  }
}
?>
