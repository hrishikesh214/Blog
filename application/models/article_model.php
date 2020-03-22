<?php 

class Article_model extends CI_Model{
	public function m_add_article($data){
		$q = $this->db->insert('articles',$data);
		if($q){
			return true;
		}
		else{
			return false;
		}
	}

	public function m_get_tags($strTags){
		$arrayTags = explode(',', $strTags);
		return $arrayTags;
	}

	public function m_get_id(){
		$e = rand();
		$c = $this->db->query("SELECT * FROM `articles` WHERE article_id = '".$e."'");
		if($c->num_rows()){
			m_get_id();
		}
		else{
			return $e;
		}
	}

	public function m_get_articles_all(){
		$filter = "*";
		$this->db->select('*');
		$this->db->order_by('article_time','DESC');
		if(isset($_SESSION['userid'])){
			//$this->db->where(array('article_poster_id'=>'*'));
			//echo "logged in";
		}
		$q = $this->db->get('articles');
		return $q->result_array();
	}

	public function m_get_articles($tags){
		$articles = $this->m_get_articles_all();
		$final_articles = array();
		$req_tags = $this->m_get_tags($tags);
		foreach ($articles as $article) {
			$article_array_tags = $this->m_get_tags($article['article_tags']);
			foreach ($req_tags as $req_tag) {
				$check = in_array($req_tag, $article_array_tags);
				if($check){
					array_push($final_articles, $article);
					break;
				}
			}
		}
		return $final_articles;
	}
}


 ?>