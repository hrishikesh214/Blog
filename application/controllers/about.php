<?php 

class About extends MY_Controller{
	public function index(){
		if($this->checkSession()){
			$this->load->view('about_view');
		}
		else{
			$this->	rBase();
		}
	}
}


?>