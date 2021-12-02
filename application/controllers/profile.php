<?php 

class Profile extends MY_Controller{
	public function index(){
		// if($this->chec)
		// $this->load->view('profile_view');
		redirect(base_url('/Profile/my_profile'));
	}
	public function my_profile(){
		if($this->checkSession()){
			$data['details'] = $this->getDetails($_SESSION['userid']);
			$this->load->view('profile_view',$data);
		}
		else{
			redirect(base_url('/Login'));
		}
	}
	public function change_my_profile(){
		if($this->checkSession()){
			$this->load->model('article_model','am');
		
			$data['details'] = $this->getDetails($_SESSION['userid']);
			$data['details']['aval_tags'] = $this->am->getAvalTags();
			unset($data['details']['password']);
			if(!isset($data['details']['user_tags'])){
			$data['details']['user_tags'] = [];
		}
			$data['details']['user_tags_array'] = explode(",", $data['details']['user_tags']);
			$data['details']['all_tags'] = array();			
			foreach ($data['details']['aval_tags'] as $aval_tag) {
				if(in_array($aval_tag, $data['details']['user_tags_array'])){
					array_push($data['details']['all_tags'],array('checked'=>true,'value'=>$aval_tag));
				}
				else{
					array_push($data['details']['all_tags'],array('checked'=>false,'value'=>$aval_tag));
				}
			}
			unset($data['details']['aval_tags']);
			unset($data['details']['user_tags_array']);
			$data['details']['user_tags']=$data['details']['all_tags'];
			unset($data['details']['all_tags']);
			// $this->c_debug($data['details']);
			$this->load->view('change_profile_view',$data);
		}
		else{
			redirect(base_url('/Login'));
		}
	}
	public function update_my_profile(){
		$isPassChange = FALSE;
		if($this->checkSession()){
			$new_details = $this->input->post();
			if(!isset($new_details['user_tags'])){
					$new_details['user_tags'] = [];
				}
			$new_details['user_tags'] = implode(",", $new_details['user_tags']);
			// $this->c_debug($new_details);

			$this->load->model('profile_model','pm');
			if($new_details['password'] != $new_details['c_password']){
				$data['details'] = $this->getDetails($_SESSION['userid']);
				$_SESSION['curr_msg'] = "Password didn't matched with the confirm password!";
				$this->load->view('change_profile_view',$data);
			}
			else{
				if($new_details['password'] === ''){
					$isPassChange = FALSE;
				}
				else{
					$isPassChange = TRUE;
				}
				$new_details['password'] = password_hash($new_details['password'], PASSWORD_BCRYPT);
				
				// $this->c_debug($new_details);
				// return;
				if($this->pm->update($new_details,$isPassChange)){
					$data['details'] = $this->getDetails($_SESSION['userid']);
					$_SESSION['curr_msg'] = "Profile edited successfully!";
					$this->load->view('profile_view',$data);
				}
			}
		}
		else{
			redirect(base_url('/Login'));
		}
	}
}


 ?>