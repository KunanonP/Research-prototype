<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cProduct extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->library('cart');
          $this->load->helper('url');
          $this->load->model('mProduct','MProduct'); //load model first before view
          $this->load->model('mCatalog','MCatalog'); //load model first before view
          $this->load->model('mRecommend','MRecommend');
          $this->load->model('mHistory','MHistory');

  }

  public function index()
  {
    $header = array(
      'title' => 'Product',
      'keywords' => 'shopping',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS'
    );

    // $index = array(
    //   'top' => 'Product'
    // );

    // $data = array();
    $this->load->view('template/header',$header);
    // $this->load->view('vProduct',$index); //load view
    $ProductID = $this->input->get('prod_ID');
    $arrayProduct = array();
    $arrayProduct['ProductDetail'] = $this->MProduct->mProDetail($ProductID);
    $this->load->view('vProduct',$arrayProduct);

    $this->load->view('template/footer');


  }

  public function ProductByCatalog($CatalogID,$CatalogName){

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
            //recommend
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
                  $groupRecommend = '';
                }
                $productRecImage= $this->MRecommend->mRecImage($groupRecommend);



          $header = array(
            'title' => $CatalogName,
            'keywords' => 'shopping',
            'description' => 'this is web application for online retailer',
            'author' => 'Kunanon Pititheerachot #12634123 UTS',
            'custname'=> $custname,
            'custlast'=>$custlast,
            'privid' => $PrivilegeID
          );


         $products = $this->MProduct->mProductByCat($CatalogID);
         $productsRec = $this->MProduct->mCategoryRecommend($CatalogID);
         $this->MRecommend->mHistory($custID,$CatalogID);
         $aCatalog = $this->MCatalog->mBeautyCatalog();
         $HistoryRecommend  = $this->MHistory->recommendationByHistory($custID);
        //  var_dump($HistoryRecommend);



         $this->load->view('template/productHeader',$header);
         $this->load->view('vProductByCatalog',array('products'=>$products,
                                                     'top'=>'Category',
                                                     'TitleGroup'=>$CatalogName,
                                                      'Catalog'=>$aCatalog,
                                                     'productRecImage' => $productRecImage,
                                                   'productsRec' => $productsRec,
                                                   'HistoryRecommend' => $HistoryRecommend)
                                                   );

        $this->load->view('template/cartfooter');
  }
}
?>
