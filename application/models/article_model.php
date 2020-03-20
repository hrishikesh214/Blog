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

	public function m_get_articles(){
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
}


 ?>