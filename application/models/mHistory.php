<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mHistory extends CI_Model
 {
       function __construct()
       {
           parent::__construct();
       }

       public function getGruopByHistory($CustomerID){

               if (isset($CustomerID)){
                 if ($CustomerID != ''){
                   $CustomerID = $CustomerID;
                 }else{
                   $CustomerID = '0';
                 }
               }

               $SQL = "SELECT CategoryID
                        FROM  history
                        WHERE CustomerID = '$CustomerID'
                        ORDER BY Visited_Times  DESC LIMIT 2";

               $query = $this->db->query($SQL);
               if ($query->num_rows() > 0) {
                  return $query->result();
               }else{
                 return 'empty';
               }
       }

       public function recommendationByHistory($customerID){


         $groupRecommend = $this->getGruopByHistory($customerID);
         if (is_array($groupRecommend)){
             $i = 0;
             $arrayGroup = array();
             foreach ($groupRecommend as $group ) {
                   $arrayGroup[$i]  = $group->CategoryID;
                   $i++;
             }

             $tgroupRecommend = implode("','", $arrayGroup);
             $groupRecommend = "'".$tgroupRecommend."'";

         }else{
             $groupRecommend = 'empty';
         }

         if ($groupRecommend  != 'empty'){

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
            return 'empty';
          }
     }


}
?>
