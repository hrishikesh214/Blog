<?php 

class Main extends MY_Controller{
	public function index(){
		if($this->checkSession()){
			redirect(base_url().'Articles');
		}
		else{
			redirect(base_url().'Articles');
		}
	}


}

?>