<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class mAccounts extends CI_Model {

	 public function FSxMFgPwdCheckEmail($tEmail){
	   $this->db->select('FTUsrEmail');
	   $this->db->from('TTKMUsr');
	   $this->db->where('FTUsrEmail', $tEmail);
	   $query = $this->db->get();
	   if($query->num_rows()>0)
	   {
		    return 'true';
	   }
	   else
	   {
		    return 'false';
	   }
	 }

	 public function FSxMFgPwd($aData){
	   $this->db->select('FTUsrEmail');
	   $this->db->from('TTKMUsr');
	   $this->db->where('FTUsrEmail',$aData['FTUsrEmail']);
	   $query = $this->db->get();
	   if($query->num_rows()>0)
	   {
		     return $query->result();
	   }
	   else
	   {
		     return false;
	   }
	 }

	 public function FSxMFgPwdSave($aData){
       		$this->db->where('FTUsrEmail',$aData['FTUsrEmail']);
       		$this->db->update('TTKMUsr',array(
       		  'FTUsrPass' => md5($aData['FTUsrPass']),
       		));
	 }
}
