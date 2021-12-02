<?php 

defined('BASEPATH') or exit('Basepath not defined');

class Signup extends MY_Controller{
	public function index(){
		$this->load->model('Article_model','am');
		$data['aval_tags'] = $this->am->getAvalTags();
		// $this->c_debug($data['aval_tags']);
		$this->load->view('signup_form',$data);
	}

	public function insert(){
		if (empty($this->input->post())) {
		    $_SESSION['curr_msg'] = "Forbidden Access!";
		    $this->rBase();
		} 
		$this->load->model('signup_model','sm');
		$new_data = $this->input->post();
		if(!isset($new_data['user_tags'])){
			$new_data['user_tags'] = [];
		}
		$new_data['user_tags'] = implode(",", $new_data['user_tags']);
		//$this->c_debug($new_data);
		$config = array(
			array(
				'field' => 'username',
				'label'=> 'Username',
				'rules'=> 'required|min_length[6]',
				'errors'=> array(
					'required'=>'Username required!',
					'min_length'=>'Username must be atleast 6 letters'
				)
			),
			array(
				'field' => 'email',
				'label'=> 'Email',
				'rules'=> 'required',
				'errors'=> array(
					'required'=>'Email required!'
					
				)
			),
			array(
				'field' => 'firstname',
				'labels'=> 'First Name',
				'rules'=> 'required',
				'errors'=> array(
					'required'=>'First Name required!'
					
				)
			),
			array(
				'field' => 'lastname',
				'labels'=> 'Last Name',
				'rules'=> 'required',
				'errors'=> array(
					'required'=>'Last Name required!'
					
				)
			),
			array(
				'field' => 'password',
				'labels'=> 'Password',
				'rules'=> 'required|min_length[8]',
				'errors'=> array(
					'required'=>'Password required!',
					'min_length'=>'Password must be atlest 6 alpha numeric'
				)
			)


		);
		if($new_data['password'] != $new_data['cPassword']){
			$_SESSION['curr_msg'] = "Password not matched with confirm password!";
			$this->load->view('signup_form',$new_data);
		}
		if($this->sm->checkUsername($new_data['username'])){
			$_SESSION['curr_msg'] = "Username exists! Try another one";
			$this->load->view('signup_form',$new_data);
		}
		$new_data['userid'] = $this->sm->generateId();
		$this->form_validation->set_rules($config);
		if($this->form_validation->run()){
			unset($new_data['submit']);
			unset($new_data['cPassword']);
			$this->sm->insertData($new_data);
			redirect(base_url());
		}
		else{
			$this->load->model('Article_model','am');
			$new_data['aval_tags'] = $this->am->getAvalTags();
			$this->load->view('signup_form',$new_data);
		}

	}
}


 ?>