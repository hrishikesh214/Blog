<?php 

class Signup_model extends CI_Model{
	public function insertData($data){
		$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
		if($this->db->insert('logs',$data)){
			return true;
		}
		else{
			return false;
		}
	}

	public function checkUsername($u){
		$this->db->select('username');
		$this->db->where('username',$u);
		$q = $this->db->get('logs');
		if($q->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function generateId(){
		$r = rand();
		$this->db->select('userid');
		$this->db->where('userid',$r);
		$q = $this->db->get('logs');
		if($q->num_rows()>0){
			generateId();
		}
		else{
			return $r;
		}
	}
}



 ?>