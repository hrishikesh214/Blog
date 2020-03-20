<?php 

class Login extends MY_Controller{

	public function index(){
		if($this->checkSession()){
			redirect(base_url().'Articles');
		}
		else{
			redirect(base_url().'Login/login_form');
		}
	}

	public function login_form(){
		$this->load->view('login-form');
	}

	public function verify(){
		$config = array(
						array(
							'field' => 'username',
							'label' => 'Username',
							'rules' => 'required',
							'errors'=> array(
								'required' => 'Username needed!'
							) 
						),
						array(
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'required',
							'errors'=> array(
								'required' => 'Password needed!'
							)
						)
					);
		$data['username'] = $this->input->post('username');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->form_validation->set_rules($config);
		if($this->form_validation->run()){
			$this->load->model('login_model','lm');
			$details = $this->lm->match($username,$password);
			$detail = $details[0];
			if($detail){
				$_SESSION['userid'] = $detail['userid'];
				$_SESSION['username'] = $detail['username'];
				$_SESSION['firstname'] = $detail['firstname'];
				$_SESSION['email'] = $detail['email'];
				redirect(base_url());
			}
			else{
				$data['error'] = $details['error'];
				$this->load->view('login-form',$data);
			}
		}
		else{
			$this->load->view('login-form',$data);
		}
	}

}

?>