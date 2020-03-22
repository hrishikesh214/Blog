<?php 

class MY_Controller extends CI_Controller{
	public function checkMyC(){
		echo "Worked MyC!";
	}

	public function checkSession(){
		if(isset($_SESSION['userid'])){
			return true;
		}
		else{
			return false;
		}
	}

	public function rBase(){
		redirect(base_url());
	}

	public function getDetails($userid){
		$this->db->select('*');
		$this->db->where(array('userid' => $userid));
		$q = $this->db->get('logs');
		return $q->result_array()[0];
	}

	public function c_debug($e){
		echo "<pre>";
		print_r($e);
		echo "</pre>";
	}
}


 ?>