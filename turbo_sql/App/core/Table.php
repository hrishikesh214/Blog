<?php 
class Table extends CodeRunner{

	public function show_table(){
		$table_name = $this->router->segment();
		$data['table_name'] = $table_name;
		$data['primary_column'] = $this->db->get_primary_column($table_name);
		$data['is_pri_aval'] = $this->db->is_pri_aval($table_name);
		$this->db->select('*');
		$data['contents'] = $this->db->get($table_name)->fetch_all(MYSQLI_BOTH);
		$data['cols'] = $this->db->count_columns($table_name);
		$data['col_names'] = $this->db->column_names($table_name);
		$this->load->view('table_contents',$data);
	}

	public function update_row(){
		$table_name = $this->router->segment();
		$row_pri_val = $this->router->segment(4);
		if(!$this->db->is_pri_aval($table_name)){
			trigger_error($table_name . " has no primary key!");
		}
		$primary_column = $this->db->get_primary_column($table_name)[0][0];
		$this->db->select('*');
		$this->db->where(array($primary_column =>$row_pri_val ));
		$data['row_data'] = $this->db->get($table_name)->fetch_array(MYSQLI_NUM);
		$data['cols'] = $this->db->count_columns($table_name);
		$data['col_names'] = $this->db->column_names($table_name);
		$data['table_name'] = $table_name;
		$data['pri_val'] = $row_pri_val;
		$this->load->view('update_view',$data);
	}
	public function save_changes(){
		$table_name = $this->router->segment();
		$row_pri_val = $this->router->segment(4);
		if(!$this->db->is_pri_aval($table_name)){
			trigger_error($table_name . " has no primary key!");
		}
		$primary_column = $this->db->get_primary_column($table_name)[0][0];
		unset($_POST['submit']);
		$this->db->where(array($primary_column => $row_pri_val));
		$u = $this->db->update($table_name,$_POST);
		if($u){
			redirect(base_url('Table/show_table/'.$table_name));
		}
	}
	public function delete_row(){
		$table_name = $this->router->segment();
		$row_pri_val = $this->router->segment(4);
		if(!$this->db->is_pri_aval($table_name)){
			trigger_error($table_name . " has no primary key!");
		}
		$pri_col_name = $this->db->get_primary_column($table_name)[0][0];
		$this->db->where(array($pri_col_name => $row_pri_val));
		$d = $this->db->delete($table_name);
		if($d){
			redirect(base_url('Table/show_table/'.$table_name));
		}
	}
	public function add(){
		$table_name = $this->router->segment();
		$data['table_name'] = $table_name;
		$data['cols'] = $this->db->count_columns($table_name);
		$data['col_names'] = $this->db->column_names($table_name);
		$this->load->view('add_row_view',$data);
	}
	public function add_row(){
		$table_name = $this->router->segment();
		foreach ($_POST as $key) {
			if($key == NULL OR $key == ''){
				$key = NULL;
			}
		}
		unset($_POST['submit']);
		foreach ($_POST as $key => $value) {
			if($value == '' OR $value == NULL){
				$value = NULL;
			}
		}
		$i = $this->db->insert($table_name,$_POST);
		if($i){
			redirect(base_url('Table/show_table/'.$table_name));
		}
		else{
			debug($this->db->error());
		}
	}

}

?>