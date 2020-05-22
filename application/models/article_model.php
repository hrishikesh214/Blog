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

	public function m_get_my_articles(){

		$this->db->select("*");
		$this->db->where('article_poster_id',$_SESSION['userid']);
		$this->db->order_by('article_time','DESC');
		$q = $this->db->get('articles');
		if($q->num_rows()>0){
			return $q->result_array();
		}
		else{
			return false;
		}
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

	public function m_get_details_article($article_id){

		if(isset($_SESSION['userid'])){
			$this->db->select('*');
			$this->db->where(array('article_id'=>$article_id,'article_poster_id'=>$_SESSION['userid']));
			$q = $this->db->get('articles');
			if($q->num_rows()){
				return array('type'=>true,'value'=>$q->row_array());
			}
			else{
				return array('type'=>false,'error'=>'Article Not found or you may not be authorized to it!');
			}
		}
		else{
			return array('type'=>false,'error'=>'You are not logged in!');
		}
	}

	public function m_delete_article($article_id){
		if(isset($_SESSION['userid'])){
			$this->db->select('article_poster_id');
			$this->db->where('article_id',$article_id);
			$article_poster_id = $this->db->get('articles')->row_array()['article_poster_id'];
			if($article_poster_id===NULL){
				return array('type'=>false,'error'=>'Article Not Found!');
			}
			if($_SESSION['userid'] == $article_poster_id){
				$this->db->where('article_id',$article_id);
				$d = $this->db->delete('articles');
				return true;
			}
			else{
				return array('type'=>false,'error'=>'Authorization Failed!');
			}
		}
		else{
			return array('type'=>false,'error'=>'You are not logged in!');
		}
	}

	public function m_update_article($article_id,$new_data){
		if(isset($_SESSION['userid'])){
			$this->db->select('article_poster_id');
			$this->db->where('article_id',$article_id);
			$article_poster_id = $this->db->get('articles')->row_array()['article_poster_id'];
			if($_SESSION['userid'] == $article_poster_id){
				unset($new_data['submit']);
				$new_data['article_tags'] = implode(",", $new_data['article_tags']);
				//print_r($new_data);
				$this->db->where('article_id',$article_id);	
				$this->db->query("UPDATE `articles` SET `article_tags` = '".$new_data['article_tags']."' WHERE `article_id` = '".$article_id."'");
				return array('type'=>$this->db->update('articles',$new_data));
			}
			else{
				return array('type'=>true,'error'=>'Authorization failed!');
			}
		}
		else{
			return array('type'=>false,'error'=>'You are not logged in!');
		}
	}

	public function like_calc($article_id){
		$this->db->select('*');
		$this->db->where('like_article_id',$article_id);
		$q = $this->db->get('likes');
		return array('article_likes' => $q->num_rows()); 
	}

	public function m_update_like($article_id){
		$like_data = array('like_article_id'=> $article_id, 'like_userid'=>$_SESSION['userid']);

		$this->db->select('*');
		$this->db->where($like_data);
		$q = $this->db->get('likes');
		
		if($q->num_rows() == null || $q->num_rows() == 0){
			$this->db->insert('likes',$like_data);
			
			return array('status'=>true,'is_like'=>'true');
		}
		else{
			$this->db->where($like_data);
			$this->db->delete('likes');
			return array('status'=>true,'is_like'=>'false');
		}

	}
	public function is_like($a){
		$this->db->select('*');
		$this->db->where(array('like_article_id'=> $a, 'like_userid'=>$_SESSION['userid']));
		$q = $this->db->get('likes');
		if($q->num_rows()>0){
			return array('article_is_like'=>true);
		}
		else{
			return array('article_is_like'=>false);
		}
	}

	public function getAvalTags(){
		$this->db->select('tag_name');
		$qs = $this->db->get('aval_tags');
		$r = array();
		$i=0;
		foreach ($qs->result_array() as $q) {
			$r[$i] = $q['tag_name'];
			$i++;
		}
		return $r;
	}
}


 ?>