<?php
defined('BASEPATH' OR exit('No direct script access allowed'));
class mCatalog extends CI_Model
{
      function __construct()
      {
          parent::__construct();
      }

      public function mCatalogList(){
            $SQL = "SELECT * FROM category ";


            $query = $this->db->query($SQL);
            if ($query->num_rows() > 0) {
              return $query->result();
            }else{
              return 'empty';
            }
      }

      public function mBeautyCatalog(){
            $SQL = "SELECT *
                    FROM category_beauty
                    ORDER BY CategoryName ASC";

            $query = $this->db->query($SQL);
            if ($query->num_rows() > 0) {
              return $query->result();
            }else{
              return 'empty';
            }
      }

      public function mSearch($search){

             if(isset($search)){
                if ($search !='') {
                    $search = $search;
                }else{
                    $search = '';
                }
             }else{
                   $search = '';
             }

             if ($search != '') {

                 //SQL Statement
                 $SQL = "SELECT * FROM product_beauty WHERE ProductName LIKE '%$search%'";

                 // echo $SQL;
                 $query = $this->db->query($SQL);
                 if ($query->num_rows() > 0) {
                   return $query->result();
                 }else{
                   return 'empty';
                 }
           }else{ return 'empty'; }
      }
}
 ?>
