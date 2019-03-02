<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mRecommend extends CI_Model
 {
       function __construct()
       {
           parent::__construct();
       }

       public function getGruopRecommend($CustomerID){

               if (isset($CustomerID)){
                 if ($CustomerID != ''){
                   $CustomerID = $CustomerID;
                 }else{
                   $CustomerID = '';
                 }
               }

               $SQL = "SELECT ORD.OrderID, ORD.OrderDate, DET.CategoryID
                        FROM  orders ORD, order_beauty DET
                        WHERE ORD.CustomerID = '$CustomerID'
                        ORDER BY OrderDate DESC LIMIT 10";

               $query = $this->db->query($SQL);
               if ($query->num_rows() > 0) {
                 return $query->result();
               }else{
                 return 'empty';
               }
       }

       public function mRecommendation($groupRecommend){
         if (isset($groupRecommend)){
           if ($groupRecommend != ''){
             $groupRecommend = $groupRecommend;
             $SQL = "SELECT PD.ProductID,
                            PD.ProductName,
                            PD.ProductDesc,
                            PD.CategoryID,
                            PD.Picture,
                            PD.Price ,
                            COUNT(RT.Rating) AS Ratingcnt,
                            ROUND(AVG(RT.Rating),1) AS Ratingavg
                      FROM rating RT
                      LEFT JOIN product_beauty PD ON RT.ProductID = PD.ProductID";
             if ($groupRecommend != '') {
                      $SQL.=" WHERE CategoryID IN($groupRecommend) ";
             }
             $SQL.=" GROUP BY ProductID ORDER BY RAND(AVG(RT.Rating)=5) DESC LIMIT 6";
             $query = $this->db->query($SQL);
             if ($query->num_rows() > 0) {
               return $query->result();
             }else{
               return 'empty';
             }
           }else{
             $groupRecommend = '';
             $SQL = "SELECT PD.ProductID,
                            PD.ProductName,
                            PD.ProductDesc,
                            PD.CategoryID,
                            PD.Picture,
                            PD.Price ,
                            COUNT(RT.Rating) AS Ratingcnt,
                            ROUND(AVG(RT.Rating),1) AS Ratingavg
                      FROM  product_beauty PD
                      LEFT JOIN rating RT ON RT.ProductID = PD.ProductID
                      WHERE RT.Rating IS NOT NULL
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
       }

       public function mRecImage($groupRecommend){
         if (isset($groupRecommend)){
           if ($groupRecommend != ''){
             $groupRecommend = $groupRecommend;
           }else{
             $groupRecommend = '';
           }
         }
         echo 'groupRecommend='.$groupRecommend;
         $SQL = "SELECT PD.ProductID,
                        PD.ProductName,
                        PD.ProductDesc,
                        PD.CategoryID,
                        PD.Picture,
                        PD.Price ,
                        ROUND(AVG(RT.Rating),1) AS Ratingavg
                  FROM rating RT
                  LEFT JOIN product_beauty PD ON RT.ProductID = PD.ProductID";

        //  if ($groupRecommend != '') {
        //     $SQL.=" WHERE CategoryID IN($groupRecommend) ";
        //  }
         $SQL.=" GROUP BY ProductID ORDER BY RAND(AVG(RT.Rating)=5) DESC LIMIT 1";
         $query = $this->db->query($SQL);
         if ($query->num_rows() > 0) {
           return $query->row();
         }else{
           return 'empty';
         }
       }
       public function mLastHistoryCount($customerID, $catalogID){
              $SQL = "SELECT COUNT(Visited_Times) AS nCOUNT FROM history WHERE CustomerID = '$customerID' AND CategoryID = '$catalogID' ";
              $query = $this->db->query($SQL);
              if ($query->num_rows() > 0) {
                    $rs =   $query->row();
                    return $rs->nCOUNT;
              }else{
                     return 0;
              }
       }

       public function mHistory($customerID, $catalogID){

              $ip = $this->input->ip_address();
              $nCOUNTHistory = $this->mLastHistoryCount($customerID, $catalogID);
              if($nCOUNTHistory == 0){
                 $SQL = "INSERT INTO history(CustomerID,CategoryID,IPAddress,Visited_Times) VALUES('$customerID','$catalogID','$ip','1')";
              }else{
                $SQL = "UPDATE history SET  Visited_Times = Visited_Times + 1 WHERE CustomerID = '$customerID' AND CategoryID = '$catalogID'";
              }

              echo $SQL;

              $this->db->query($SQL);

       }






}
?>
