<?php 

class Logout extends MY_Controller{
	public function index(){
		session_unset();

		redirect(base_url());
	}
}

?>