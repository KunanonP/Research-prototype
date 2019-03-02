<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cUser extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->model('mUser','MUser'); //load model first before view
  }

  public function index()
  {

      if ($this->session->has_userdata('customerNameSess')) {
          $custname = $this->session->userdata('customerNameSess');
      }else {
          $custname = '';
      }

      if ($this->session->has_userdata('PrivilegeID')) {
          $PrivilegeID = $this->session->userdata('PrivilegeID');
      }else {
          $PrivilegeID = '';
      }

       if (isset($PrivilegeID)){
         if ($PrivilegeID == ''){
            echo "<script>   alert('You are not allowed !'); window.location = 'home'; </script>";
         }else if ($PrivilegeID == '1'){
           echo "<script>   alert('You are not allowed !'); window.location = 'home'; </script>";
         }else{

         }

       }

      $header = array(
        'title' => 'Userpage',
        'keywords' => 'shopping',
        'description' => 'Userpage',
        'author' => 'Kunanon Pititheerachot #12634123 UTS',
        'custname' => $custname,
        'PrivilegeID'=> $PrivilegeID,
        'privid' => $PrivilegeID
      );

      $pvlList = $this->MUser->mPrivilegeList();

      $index = array(
        'top' => 'User list',
        'PrivilegeID'=> $PrivilegeID,
        'PrivList' => $pvlList
      );

      $this->load->view('template/header',$header); //header
      $this->load->view('vUser',$index); //load view
      $this->load->view('template/footer'); //footer


  }
  //showing updated table load from model
  public function userlist(){
          $aData = array(

          );
         $firstname_f = $this->input->get('fristname_f');       //get post data from view page
         $lastname_f = $this->input->get('lastname_f');
         $email_f = $this->input->get('email_f');

         $aData['aUser'] = $this->MUser->mUserList($firstname_f ,$lastname_f ,$email_f);
         $this->load->view('vUserList',$aData);
  }

  public function save(){
      //receive parameter from view page
      // $privilegeid = $this->input->post('sPrivilegeID');
      $privilege = $this->input->post('sPrivilege');
      $firstname = $this->input->post('sFirstname');       //get post data from view page
      $lastname = $this->input->post('sLastname');
      $address1 = $this->input->post('sAddress1');
      $address2 = $this->input->post('sAddress2');
      $city = $this->input->post('sCity');
      $state = $this->input->post('sState');
      $postcode = $this->input->post('sPostcode');
      $country = $this->input->post('sCountry');
      $username = $this->input->post('sUsername');
      $password = $this->input->post('sPassword');
      $email = $this->input->post('sEmail');
      $tel = $this->input->post('sTel');
      $action_mode = $this->input->post('action_mode');

      // $username   =     $this->input->post('username');
      // $password   =     $this->input->post('password');

      // echo $res;
        $pwEnc = md5($password);
      // $pwEnc = base64_encode($password);
      // $pwEnc = $this->encryption->encrypt($password);
      // $csinfo = $this->MLogin->Login($username,$pwEnc);

      if ($action_mode == '1') {
        //save new user to register
        $data = array('CustomerFirstname' =>$firstname ,        //store data from view page as array
                      'CustomerLastname'=>$lastname,
                      'CustomerAddr1' => $address1,
                      'CustomerAddr2' => $address2,
                      'City' => $city,
                      'State' => $state,
                      'Postcode' => $postcode,
                      'Country' => $country,
                      'Username' => $username,
                      'Password' => $pwEnc,
                      'Email' => $email,
                      'CustomerTel' => $tel,
                      'PrivilegeID' => $privilege
                    );
         $res = $this->MUser->mSave($data);
         echo $res;

        //  $data2 = array(
        //               'PrivilegeID' =>  $privilegeID
        //             );
        //  $res2 = $this->MUser->mSaveP($data2);
        //  echo $res2;

      }else{
        //update request
        $id = $this->input->post('UserID');
        $data = array(
                        'CustomerFirstname' =>$firstname ,        //store data from view page as array
                        'CustomerLastname'=>$lastname,
                        'CustomerAddr1' => $address1,
                        'CustomerAddr2' => $address2,
                        'City' => $city,
                        'State' => $state,
                        'Postcode' => $postcode,
                        'Country' => $country,
                        'Username' => $username,
                        'Password' => $pwEnc,
                        'Email' => $email,
                        'CustomerTel' => $tel,
                        'PrivilegeID' => $privilege
                    );
                    $res = $this->MUser->mUpdate($id,$data);      //result
                    echo $res;
      }
  }
  public function save2(){
      //receive parameter from view page
      $privilegeid = $this->input->post('sPrivilegeID');
      $firstname = $this->input->post('sFirstname');       //get post data from view page
      $lastname = $this->input->post('sLastname');
      $address1 = $this->input->post('sAddress1');
      $address2 = $this->input->post('sAddress2');
      $city = $this->input->post('sCity');
      $state = $this->input->post('sState');
      $postcode = $this->input->post('sPostcode');
      $country = $this->input->post('sCountry');
      $username = $this->input->post('sUsername');
      $password = $this->input->post('sPassword');
      $email = $this->input->post('sEmail');
      $tel = $this->input->post('sTel');
      $action_mode = $this->input->post('action_mode');

      // $username   =     $this->input->post('username');
      // $password   =     $this->input->post('password');

      // echo $res;
      $pwEnc = base64_encode($password);
      // $csinfo = $this->MLogin->Login($username,$pwEnc);

      if ($action_mode == '1') {
        //save new user to register
        $data = array('CustomerFirstname' =>$firstname ,        //store data from view page as array
                      'CustomerLastname'=>$lastname,
                      'CustomerAddr1' => $address1,
                      'CustomerAddr2' => $address2,
                      'City' => $city,
                      'State' => $state,
                      'Postcode' => $postcode,
                      'Country' => $country,
                      'Username' => $username,
                      'Password' => $pwEnc,
                      'Email' => $email,
                      'CustomerTel' => $tel,
                      'PrivilegeID' => $privilegeid
                    );
         $res = $this->MUser->mSave($data);
         echo $res;

        //  $data2 = array(
        //               'PrivilegeID' =>  $privilegeID
        //             );
        //  $res2 = $this->MUser->mSaveP($data2);
        //  echo $res2;

      }else{
        //update request
        $id = $this->input->post('UserID');
        $data = array(
                        'CustomerFirstname' =>$firstname ,        //store data from view page as array
                        'CustomerLastname'=>$lastname,
                        'CustomerAddr1' => $address1,
                        'CustomerAddr2' => $address2,
                        'City' => $city,
                        'State' => $state,
                        'Postcode' => $postcode,
                        'Country' => $country,
                        'Username' => $username,
                        'Password' => $pwEnc,
                        'Email' => $email,
                        'CustomerTel' => $tel,
                        'PrivilegeID' => $privilegeid
                    );
                    $res = $this->MUser->mUpdate($id,$data);      //result
                    echo $res;
      }
  }
  //deleting
  public function remove(){
      $id = $this->input->get('UserID');
      $data = array('CustomerID' => $id);
      $res = $this->MUser->mRemove($data);
      echo $res;
  }


}
?>
