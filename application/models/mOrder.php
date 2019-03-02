<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mOrder extends CI_Model
 {
       function __construct()
       {
           parent::__construct();
       }

  public function mgetOrderID(){
    $SQL = "SELECT
              orders.OrderID
              FROM
              orders
              GROUP BY
              orders.OrderDate DESC LIMIT 1
              ";

        $query = $this->db->query($SQL);
        if ($query->num_rows() > 0) {
            return  $query->row();
        }else{
          return 'empty';
        }
  }

  public function mSavepayment($DataPayment){
    $this->db->insert('payment',$DataPayment);
  }

  public function msaveOrder($OrderData){
      $this->db->insert('orders',$OrderData);
  }

  public function msaveOrderDetail($OrderData){
      $this->db->insert('order_beauty',$OrderData);
  }

  public function mgetLastOrder($LastOrderID){
    $SQL = "SELECT ORD.OrderID,
            ORD.ProductImage,
            ORD.ProductID,
            ORD.ProductName,
            ORD.Quantity,
            ORD.Price,
            PAY.PaymentID,
            PAY.CardName,
            PAY.CardNumber,
            PAY.CardExpire
            FROM order_beauty ORD
            INNER JOIN payment PAY
            ON ORD.OrderID = PAY.OrderID
            WHERE ORD.OrderID = '$LastOrderID'            ";

        $query = $this->db->query($SQL);
        if ($query->num_rows() > 0) {
            return  $query->result();
        }else{
          return 'empty';
        }
  }

  public function mgetLastPayment($LastOrderID){
        $SQL = "SELECT *
                FROM payment
                WHERE OrderID = '$LastOrderID'";
        $query = $this->db->query($SQL);
        if ($query->num_rows() > 0) {
          return $query->row();
        }else{
          return 'empty';
        }
  }

  public function mgetHistory($CustomerID){
      $SQL = "SELECT ORD.*, DET.*
              FROM orders ORD, order_beauty DET
              WHERE CustomerID = '$CustomerID'
              AND ORD.OrderID = DET.OrderID
              GROUP BY
              OrderDate DESC LIMIT 5
              ";

              $query = $this->db->query($SQL);
              if ($query->num_rows() > 0) {
                  return  $query->result();
              }else{
                return 'empty';
              }
  }

  public function mReport(){
      $SQL = "SELECT ORD.OrderDate,
                      ORD.OrderID,
                      ORD.OrderQTY,
                      ORD.OrderTotal,
                      ORD.PaymentType,
                      ORD.ShippingFirstName,
                      ORD.ShippingLastName,
                      ORD.ShippingAddress1,
                      ORD.ShippingAddress2,
                      ORD.ShippingCity,
                      ORD.ShippingState,
                      ORD.ShippingPostcode,
                      ORD.ShippingCountry,
                      ORD.ShippingEmail,
                      ORD.ShippingTel,
                      DET.ProductID,
                      DET.ProductName,
                      DET.Price,
                      DET.Quantity
              FROM order_beauty DET
              LEFT JOIN orders ORD ON ORD.OrderID = DET.OrderID
              ORDER BY ORD.OrderDate DESC";

              $query = $this->db->query($SQL);
              if ($query->num_rows() > 0) {
                  return  $query->result();
              }else{
                return 'empty';
              }
  }

  public function mReportRecently($last2HR,$cDateTime){
      $SQL = "SELECT ORD.OrderDate,
                      ORD.OrderID,
                      ORD.OrderQTY,
                      ORD.OrderTotal,
                      ORD.PaymentType,
                      ORD.ShippingFirstName,
                      ORD.ShippingLastName,
                      ORD.ShippingAddress1,
                      ORD.ShippingAddress2,
                      ORD.ShippingCity,
                      ORD.ShippingState,
                      ORD.ShippingPostcode,
                      ORD.ShippingCountry,
                      ORD.ShippingEmail,
                      ORD.ShippingTel,
                      DET.ProductID,
                      DET.ProductName,
                      DET.Price,
                      DET.Quantity
              FROM order_beauty DET
              LEFT JOIN orders ORD ON ORD.OrderID = DET.OrderID
              where ORD.OrderDate BETWEEN '$last2HR' AND '$cDateTime'
              ORDER BY ORD.OrderDate DESC";

              $query = $this->db->query($SQL);
              if ($query->num_rows() > 0) {
                  return  $query->result();
              }else{
                return 'empty';
              }
  }

}

?>
