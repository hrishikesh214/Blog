<?php 

class Login_model extends CI_Model{

	public function match($u,$p){
		//$p = $this->db->escape(password_hash($p, PASSWORD_BCRYPT));
		$this->db->select("*");
		$this->db->where('username',$u);
		$q = $this->db->get('logs');
		if($q->num_rows()>0){
			if(password_verify($p, $q->row_array()['password'])){
				return $q->result_array();
			}
			else{
				return array( 0 => false , 'error' => "Password didn't matched!");
			}
		}
		else{
			return array( 0 => false , 'error' => "Username Doesn't exists!");
		}
	}
}


 ?>