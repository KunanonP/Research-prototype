<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cApi extends CI_Controller {

  function __construct(){
          parent::__construct();
  }

  public function createForm(){
    $csrf = array(
         'name' => $this->security->get_csrf_token_name(),
         'hash' => $this->security->get_csrf_hash()
        //  'csrf' => $csrf
     );
    $this->load->view('vApiForm');
  }

  public function delete($customerID){
    Redirect("http://192.168.0.3/API/delete?CustID=$customerID");
  }

  public function customerRead(){
    $data ="";
    $data_string = json_encode($data);
    // $API = "/Api/Register/Admin/BusinessList";
    $CallAPI = 'http://192.168.0.3/API/read';
    //echo $CallAPI;
    $ch = curl_init($CallAPI);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);

    //execute post
    $result = curl_exec($ch);
    //echo $result;
    //close connection
    curl_close($ch);

    //echo $result;
    $json=json_decode($result,true);
    $nRows = count($json);

    echo $nRows;
    echo "<table><tr>";
    echo "<th>customerID</th>
          <th>firstname</th>
          <th>lastname</th>
          <th>lastname</th>
          </tr>";
    echo "<tr>";
    for($i = 0; $i< $nRows; $i++){
    $custID = $json[$i]['CustomerID'];
    $custName = $json[$i]['CustomerFirstname'];
    $custLast = $json[$i]['CustomerLastname'];
    echo "<td>$custID</td>
          <td>$custName</td>
          <td>$custLast</td>";
    echo "</tr>";
    }
  }
}




?>
