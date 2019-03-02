<?php
	
	/**
	* Fs set language
	*/
	function language($file, $string) {
		$obj = & get_instance();		
		if (@$_SESSION['lang'] == '' || @$_SESSION['lang'] == 'th') {
			@$_SESSION['lang'] = 'th';
			$lang = 'th';
		} else {
			$lang = $_SESSION['lang'];
		}		
		$obj->lang->load($file,$lang);		
		$rs = $obj->lang->line($string);		
		if ($rs) {
			return $rs; 
		} else {
			return $string;
		}
	}

		
	/**
	* Fs check Remember
	*/
	/*function FSxRemember() {			
		if (!$_SESSION['username']) {
			if (isset($_COOKIE['auth'])) {
				parse_str($_COOKIE['auth']);	
				$this->session->set_userdata("username", $username);
   				$this->session->set_userdata("FTUsrGrpAlw", $FTUsrGrpAlw);
   				$this->session->set_userdata("FNPvlGrpId",$FNPvlGrpId);
			} else {
				
			}
		} else {
			
		}	
	}*/
