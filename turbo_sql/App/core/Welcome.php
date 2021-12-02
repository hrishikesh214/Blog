<?php
defined('BASEPATH')
OR exit('ERROR: NO DIRECT SCRIPT ALLOWED!');

class Welcome extends CodeRunner {
	public function index(){
		$this->load->view('welcome_view');
	}
}

?>