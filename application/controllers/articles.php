<?php 

class Articles extends MY_Controller{
	public function index(){
		// if(!$this->checkSession()){$this->rBase();}
		redirect(base_url().'Articles/view_articles');
	}

	public function view_articles(){
		$this->load->model('article_model','am');
		if($this->checkSession()){
			$f = $this->getDetails($_SESSION['userid']);
			$user_tags = $f['user_tags'];
			$as =$this->am->m_get_articles_forUser($user_tags);
		}
		else{
			$as =$this->am->m_get_articles_all();
		}
		//$this->c_debug($as);

		$articles = array();
		$i = 0;
		foreach ($as as $a) {
			$a = array_merge($a,$this->getDetails($a['article_poster_id']));
			$a = array_merge($a,$this->am->like_calc($a['article_id']));
			if($this->checkSession()){$a = array_merge($a,$this->am->is_like($a['article_id']));}
			$articles[$i] = $a;
			$i++;
		}

		$data['articles'] = $articles; 
		//$this->c_debug($data['articles']);
		$this->load->view('articles_view',$data);
	}

	public function my_articles(){
		$this->load->model('article_model','am');
		if($this->checkSession()){
			$f = $this->getDetails($_SESSION['userid']);
			$user_tags = $f['user_tags'];
			$as =$this->am->m_get_my_articles();
		}
		else{
			redirect(base_url('/Login'));
		}
		//$this->c_debug($as);
		if($as !== false){
			$articles = array();
			$i = 0;
			foreach ($as as $a) {
				$a = array_merge($a,$this->getDetails($a['article_poster_id']));
				$a = array_merge($a,$this->am->like_calc($a['article_id']));
				$a = array_merge($a,$this->am->is_like($a['article_id']));
				$articles[$i] = $a;
				$i++;
			}
			$data['articles'] = $articles; 
		}
		else{
			$data['no_article_msg'] = "You have not posted any Articles yet!";
		}
		//$this->c_debug($data['articles']);
		$this->load->view('articles_view',$data);
	}

	public function add_article(){
		$this->load->model('article_model','am');
		$data['aval_tags'] = $this->am->getAvalTags();
		//$this->c_debug($data['aval_tags']);
		$this->load->view('add_article_view',$data);
	}
	public function post_article(){
		$this->load->model('article_model','am');
		$data['article_tags'] = 'Default';
		$data['article_title'] = $this->db->escape_str($this->input->post('article_title'));
		$data['article_body'] = $this->db->escape_str($this->input->post('article_body'));
		// $data['article_tags'] = $data['article_tags'] . $this->db->escape_str($this->input->post('article_tags'));
		$data['article_id'] = $this->am->m_get_id();
		$data['article_time'] = NULL;
		$data['article_poster_id'] = $_SESSION['userid'];
		$data['article_tags_noString'] = $this->input->post('article_tags[]');
		if (is_array($data['article_tags_noString'])) {
			$data['article_tags'] = implode(",", $data['article_tags_noString']);
		}
		unset($data['article_tags_noString']);
		//$this->c_debug($data);
		$config = array(

					array('field' => 'article_title',
						  'label' => 'Article title',
						  'rules' => 'required',
						  'errors'=> array('required'=>'Title required!')
					),
					array('field' => 'article_body',
						  'label' => 'Article body',
						  'rules' => 'required',
						  'errors'=> array('required'=>'Body required!')
					)

		);
		$this->form_validation->set_rules($config);
		if($this->form_validation->run()){
			if($this->am->m_add_article($data)){

				redirect($this->rBase());
			}
			else{
				$_SESSION['curr_msg'] = "Something went wrong. Please try again!";
				redirect($this->rBase());
			}
			
		}
		else{

			$this->load->view('add_article_view',$data);
		}

	}

	public function Settings(){

		$article_id = intval($this->uri->segment(3));
		//echo $article_id;
		$this->load->model('article_model','am');
		$v = $this->am->m_get_details_article($article_id);
		$v['value']['article_tags'] = explode(',', $v['value']['article_tags']);
		// $this->c_debug($v);
		if($v['type']){
			$data['article']=$v['value'];
			$data['aval_tags'] = $this->am->getAvalTags();
			$data['all_tags'] = array();			
			foreach ($data['aval_tags'] as $aval_tag) {
				if(in_array($aval_tag, $data['article']['article_tags'])){
					array_push($data['all_tags'],array('checked'=>true,'value'=>$aval_tag));
				}
				else{
					array_push($data['all_tags'],array('checked'=>false,'value'=>$aval_tag));
				}
			}			
			// $this->c_debug($data['all_tags']);
			$this->load->view('article_setting',$data);
		}
		else{
			$_SESSION['curr_msg'] = $v['error'];			
			redirect(base_url());
		}

	}

	public function confirm_delete(){
		if($this->checkSession()){
			$data['cdm'] = intval($this->uri->segment(3));
			$this->load->view('confirm_delete_view',$data);
		}
		else{
			$this->rBase();
		}
		
	}

	public function delete_article(){
		$this->load->model('article_model','am');
		$d = $this->am->m_delete_article($this->uri->segment(3));
		
		$this->rBase();
	}

	public function update_article(){
		$this->load->model('article_model','am');
		$new_data=$this->input->post();
		// $this->c_debug($new_data);

		$u = $this->am->m_update_article($this->uri->segment(3),$new_data);
		redirect($this->rBase());
	}

	public function like(){
		if($this->checkSession()){
			$this->load->model('article_model','am');
			$ai = intval($this->uri->segment(3));
			$l = $this->am->m_update_like($ai);
			if($l['status']){
				echo $l['is_like'];
			}
			else{
				echo 'notdone';
			}
		}
		else{
			redirect(base_url());
		}
	}
}


?>