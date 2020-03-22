<?php 

class Profile_model extends CI_Model{

	public function update($e,$isPassChange){
		if($isPassChange){
			$details = array(
				'username'=>$e['username'],
				'email' => $e['email'],
				'firstname' => $e['firstname'],
				'lastname' => $e['lastname'],
				'user_tags' => $e['user_tags'],
				'password' => $e['password']
			);
		}
		else{
			$details = array(
				'username'=>$e['username'],
				'email' => $e['email'],
				'firstname' => $e['firstname'],
				'lastname' => $e['lastname'],
				'user_tags' => $e['user_tags']
			);
		}
		$this->db->where('userid',$_SESSION['userid']);
		return $this->db->update('logs',$details);
	}

}


 ?>