<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cCart extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('cart');
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->model('mCart','MCart'); //load model first before view
          $this->load->helper('form');
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


    if ($this->session->has_userdata('csID')) {
        $custID = $this->session->userdata('csID');
    }else {
        $custID = '';
    }

    $csrf = array(
         'name' => $this->security->get_csrf_token_name(),
         'hash' => $this->security->get_csrf_hash()
        //  'csrf' => $csrf
     );

    $header = array(
      'title' => 'Shopping Cart',
      'keywords' => 'account',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS',
      'custname'=> $custname,
      'custlast'  => $custlast,
      'privid' => $PrivilegeID,
      'csrf' => $csrf

    );

    $data = array();
    $this->load->view('template/header',$header);
    // $this->load->view('vCart',$index); //load view
    // $cartData = array();
    // $cartData['cartUser'] = $this->MCart->mCartuser();
    $this->load->view('vCart');
    $this->load->view('template/cartfooter');
    // $pvlList = $this->MCart->mCartuser();
  }

  public function usercart(){
            $cartData = array();
            $cartData['cartUser'] = $this->MCart->mCartuser();
            $this->load->view('vCart',$cartData);
  }

  public function addtocart(){

        $ProdID = $this->input->post('prodID');
        $ProdName = $this->input->post('prodName');
        $ProdPrice = $this->input->post('prodPrice');
        $ProdQty = $this->input->post('qty');
        $ProdPic = $this->input->post('prodPic');
        $prodCat = $this->input->post('prodCat');
        $data = array(
        'id'      => $ProdID,
        'qty'     => $ProdQty,
        'price'   => $ProdPrice,
        'name'    => $ProdName,
        'image' => $ProdPic,
        'category' => $prodCat,
        );

        $this->cart->insert($data);
        redirect('cart');
        //$this->index();
  }

  public function updatecart(){
         $i =1;
          foreach ($this->cart->contents() as $item) {
                   $cart_up_data[] = array(
                   'rowid' => $item['rowid'],
                   'qty' => $this->input->post('qty'.$i)
                   );
                   $i++;
           }

          $this->cart->update($cart_up_data);
          redirect('cart');
          // $this->index();

  }

  public function removeitem($rowid){
         $data = array(
                  'rowid' =>$rowid ,
                  'qty'   => 0
               );


           $this->cart->update($data);
           redirect('cart');
  }

  public function remove_allitem(){
            $this->cart->destroy();
            redirect('cart');
  }
}
?>
