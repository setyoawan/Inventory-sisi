<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class Auth{

	private $CI = NULL;

	function __construct(){
		$this->CI = & get_instance();
	}


	public function privilege_check($link, $action){
	$this->CI->load->model('Role_menu_m');

	$access = $this->CI->Role_menu_m->check_auth($link, $action);
            if ($access > 0) {
                return true;
            }
            return false;
}

public function no_access()
    {
        $this->CI->template->load('no_access');
    }
}
