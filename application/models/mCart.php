<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mCart extends CI_Model
 {
       function __construct()
       {
           parent::__construct();
       }

  public function mCartuser(){
    $SQL = "SELECT *
            FROM order_cart";
        $query = $this->db->query($SQL);
        if ($query->num_rows() > 0) {
          return $query->result();
        }else{
          return 'empty';
        }
  }
}

?>
