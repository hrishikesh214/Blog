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
			$data['details'] = $this->getDetails($_SESSION['userid']);
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
			$this->load->model('profile_model','pm');
			if($new_details['password'] != $new_details['c_password']){
				$data['details'] = $this->getDetails($_SESSION['userid']);
				$data['curr_msg'] = "Password didn't matched with the confirm password!";
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
				
				//$this->c_debug($new_details);
				
				if($this->pm->update($new_details,$isPassChange)){
					$data['details'] = $this->getDetails($_SESSION['userid']);
					$data['curr_msg'] = "Profile edited successfully!";
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