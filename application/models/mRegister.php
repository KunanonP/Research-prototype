<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mRegister extends CI_Model
 {
       function __construct()
       {
           parent::__construct();
       }

       public function mCreate($userdata){
          if ($this->db->insert('member',$userdata)) { //INSERT .... INTO register
            redirect('home');
          }else{
            return 'error';
          }
        }
     }
?>
