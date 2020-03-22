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
			$as =$this->am->m_get_articles($user_tags);
		}
		else{
			$as =$this->am->m_get_articles_all();
		}
		//$this->c_debug($as);

		$articles = array();
		$i = 0;
		foreach ($as as $a) {
			$a = array_merge($a,$this->getDetails($a['article_poster_id']));
			$articles[$i] = $a;
			$i++;
		}

		$data['articles'] = $articles; 
		//$this->c_debud($data['articles']);
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
		$this->load->view('add_article_view');
	}
	public function post_article(){
		$this->load->model('article_model','am');
		$data['article_tags'] = 'all,';
		$data['article_title'] = $this->db->escape_str($this->input->post('article_title'));
		$data['article_body'] = $this->db->escape_str($this->input->post('article_body'));
		$data['article_tags'] = $data['article_tags'] . $this->db->escape_str($this->input->post('article_tags'));
		$data['article_id'] = $this->am->m_get_id();
		$data['article_time'] = NULL;
		$data['article_poster_id'] = $_SESSION['userid'];

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

				$data['curr_msg'] = "One Article Added !";
				$this->load->view('add_article_view',$data);
			}
			else{
				$data['curr_msg'] = "Something went wrong<br>Please try again!";
				$this->load->view('add_article_view',$data);
			}
			
		}
		else{

			$this->load->view('add_article_view',$data);
		}

	}
}


 ?>