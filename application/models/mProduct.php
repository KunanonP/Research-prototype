<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mProduct extends CI_Model
 {
       function __construct()
       {
           parent::__construct();
       }


       public function mProDetail($ProdID){
             $SQL = "SELECT PD.*, PB.CategoryName ,
                      COUNT(RT.Rating) AS Ratingcnt,
                      ROUND(AVG(RT.Rating),1) AS Ratingavg
                      FROM product_beauty PD
                      LEFT JOIN rating RT ON RT.ProductID = PD.ProductID
                      LEFT JOIN category_beauty PB ON PD.CategoryID = PB.CategoryID
                      WHERE PD.ProductID = '$ProdID'";

             $query = $this->db->query($SQL);
             if ($query->num_rows() > 0) {
               return $query->row();
             }else{
               return 'empty';
             }
       }

       public function mProRate($ProdID){
             $SQL = "SELECT RT.Rating, RT.TimeStamp,RT.UserID
                    --  ,UR.UserID
                      FROM rating RT
                      -- LEFT JOIN user_rate UR ON RT.UserID = UR.UserID
                      WHERE RT.ProductID = '$ProdID'
                      ORDER BY RT.TimeStamp DESC LIMIT 100";
                      $query = $this->db->query($SQL);
                      if ($query->num_rows() > 0) {
                        return $query->result();
                      }else{
                        return 'empty';
                      }
       }

       public function mProductByCat($CatalogID){

               $SQL = "SELECT PD.ProductID,
                              PD.ProductName,
                              PD.ProductDesc,
                              PD.CategoryID,
                              PD.Picture,
                              PD.Price
                      -- ROUND(AVG(RT.Rating),1) AS Rating
                      FROM product_beauty PD
                      -- LEFT JOIN  rating RT ON RT.ProductID = PD.ProductID
                      WHERE PD.CategoryID = '$CatalogID'
                      -- GROUP BY ProductID";
               $query = $this->db->query($SQL);
               if ($query->num_rows() > 0) {
                 return $query->result();
               }else{
                 return 'empty';
               }
       }
    //  ROUND(AVG(RT.Rating),1) AS Ratingavg
       public function mCategoryRecommend($CatalogID){
         $SQL = "SELECT PD.ProductID,
                        PD.ProductName,
                        PD.ProductDesc,
                        PD.CategoryID,
                        PD.Picture,
                        PD.Price,
                        COUNT(RT.Rating) AS Ratingcnt,
                        ROUND(AVG(RT.Rating),1) AS Ratingavg
                  FROM  product_beauty PD
                  LEFT JOIN rating RT ON RT.ProductID = PD.ProductID
                  WHERE PD.CategoryID IN($CatalogID) AND RT.Rating IS NOT NULL
                  GROUP BY ProductID
                  ORDER BY COUNT(RT.Rating) DESC LIMIT 6";

         $query = $this->db->query($SQL);
         if ($query->num_rows() > 0) {
           return $query->result();
         }else{
           return 'empty';
         }
       }


}

?>
