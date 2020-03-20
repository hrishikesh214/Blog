<?php 

class Login_model extends CI_Model{

	public function match($u,$p){
		$p = md5($p);
		$this->db->select("*");
		$this->db->where(array('username'=>$u,'password'=>$p));
		$q = $this->db->get('logs');
		if($q->num_rows()){
			return $q->result_array();
		}
		else{
			return array( 0 => false , 'error' => 'Username And Password Didnt matched!');
		}
	}
}


 ?>