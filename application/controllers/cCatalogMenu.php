<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cCatalogMenu extends CI_Controller {

  function __construct(){
          parent::__construct();

          $this->load->model('mCatalog','MCatalog'); //load model first before view
  }

  public function cCatalogList(){
         $aCatalog = $this->MCatalog->mCatalogList();
         $index = array(
           'Catalog' => $aCatalog
         );
         return $this->load->view('vCatalogMenu',$index);
  }
}
?>
