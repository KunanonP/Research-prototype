<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mUser extends CI_Model
 {
       function __construct()
       {
           parent::__construct();
       }
       //updated list
       public function mUserList($fname, $lname, $email){
              //SQL Statement
              $SQL = "SELECT * FROM customer WHERE 1 ";
              if ($fname !='') {
                  $SQL.=" AND CustomerFirstname LIKE '%$fname%'";
              }
              if ($lname !='') {
                  $SQL.=" AND customerLastname  LIKE '%$lname%'";
              }
              if ($email !=''){
                  $SQL.=" AND Email     LIKE '%$email%'";
              }
              // echo $SQL;
              $query = $this->db->query($SQL);
              if ($query->num_rows() > 0) {
                return $query->result();
              }else{
                return 'empty';
              }
       }
       //Add function
       public  function mSave($data){
              if ($this->db->insert('customer',$data)) { //INSERT .... INTO register
                return 'success';
              }else{
                return 'error';
              }
       }

       public  function mSaveP($data2){
              if ($this->db->insert('customer_privilege',$data2)) { //INSERT .... INTO register
                return 'success';
              }else{
                return 'error';
              }
       }

       //Delete function
       public function mRemove($data){
            if ($this->db->delete('customer',$data)) { // DELETE FROM register ....
              return 'delete success';
            }else{
              return 'error';
            }

       }

      //Update function
       public function mUpdate($id,$data){
            $this->db->where('CustomerID',$id); // WHERE id = ' ';
            if ($this->db->update('customer',$data)) { // UPDATE SET ...
              return "success";
            }else{
              return 'error';
         }
       }

       public function mPrivilegeList(){
             $SQL = "SELECT * FROM customer_privilege";
             $query = $this->db->query($SQL);
             if ($query->num_rows() > 0) {
               return $query->result();
             }else{
               return 'empty';
             }
       }

 }
 ?>
