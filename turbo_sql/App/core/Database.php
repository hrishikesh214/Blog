<?php 
class Database extends CodeRunner{
	public function index(){
		redirect(base_url('Database/list_tables'));
	}

	public function  list_tables(){
		$data['curr_dbname'] = $this->db->query("SELECT database()")->fetch_all()[0][0];
		$sql = "SELECT table_name FROM information_schema.tables WHERE table_schema = database()";
		$data['tables'] = $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
		$this->load->view('table_list',$data);
	}

	public function struc_table(){
		$table_name = $this->router->segment();
		$sql = $this->db->query("DESCRIBE ".$table_name)->fetch_all(MYSQLI_ASSOC);
		$data['table_struc'] = $sql;
		$data['table_cols'] = sizeof($sql);
		$data['table_name'] = $table_name;
		$myarray = array();
		$i = 0;
		foreach ($data['table_struc'] as $x) {
			$myarray[$i]['name'] = $x['Field'];
			$myarray[$i]['props'] = array();
			unset($x['Field']);
			foreach($x as $key => $y){
				if($y != NULL or $y != ''){
					$myarray[$i]['props'][$key] = $y;
				}
			}
			$i++;
		}
		$data['table_struc'] = $myarray;
		$this->load->view('struc_table_view',$data);
	}

	public function edit_struc(){
		$table_name = $this->router->segment();
		$field_name = $this->router->segment(4);
		$sql = "DESCRIBE ".$table_name;
		$table_struc = $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
		foreach ($table_struc as $x) {
			if($x['Field'] == $field_name){
				$field_info = $x;
				break;
			}
			else{
				$field_info = False;
			}
		}
		$data['table_name'] = $table_name;
		$data['table_cols'] = sizeof($table_struc);
		$data['field_name'] = $field_name;
		$data['field_info'] = $field_info;
		$this->load->view('edit_table_view',$data);
	}

	public function update_col(){
		$table_name = $this->router->segment();
		$field_name = $this->router->segment(4);
		unset($_POST['submit']);
		if( is_string($_POST['Default']) AND ($_POST['Default'] != '' OR $_POST['Default'] != NULL)){
			if($_POST['Type'] != 'timestamp'){
				$_POST['Default'] = "'".$_POST['Default']."'";
			}
		}
		$a_q = "ALTER TABLE `".$table_name."` CHANGE `".$field_name ."` `". $_POST['Field']."` " .$_POST['Type'];
		if(isset($_POST['NotNull']) AND $_POST['NotNull'] == 'on'){
			$a_q .= " NOT NULL";
		}
		if(isset($_POST['Default']) AND ($_POST['Default'] != '') OR $_POST['Default'] != NULL){
			$a_q .= " DEFAULT " . $_POST['Default'];
		}
		if(isset($_POST['Extra']) AND ($_POST['Extra'] != '') OR $_POST['Extra'] != NULL){
			$a_q .= " " . $_POST['Extra'];
		}
		$rq = $this->db->query($a_q);
		if($rq){
			redirect(base_url('Database/struc_table/'.$table_name));
		}
		else{
			debug($this->db->error());
		}
	}
	public function add(){
		$data['dbname'] = $this->db->query("SELECT database() AS dbname")->fetch_array(MYSQLI_ASSOC)['dbname'];
		$this->load->view('add_table_1',$data);
	}
	public function add_table(){
		$data['dbname'] = $this->db->query("SELECT database() AS dbname")->fetch_array(MYSQLI_ASSOC)['dbname'];
		$data['table_name'] = $_POST['table_name'];
		$data['cols'] = $_POST['cols'];
		$this->load->view('add_table_2',$data);
	}
	public function new_table(){
		unset($_POST['submit']);
		$cols = $_POST['cols'];
		$table_name = $_POST['table_name'];
		unset($_POST['table_name']);
		unset($_POST['cols']);
		$fields_info = array();
		for($x=1;$x<=$cols;$x++){
			foreach($_POST as $k => $v){
				$k = explode('_', $k);
				$fno = $k[2];
				$fname = $k[1];
				if($fno == $x){
					$fields_info[$x][$fname] = $v;
				}
			}
		}
		$times = 1;
		$query = "CREATE TABLE ".$table_name." (";
		foreach ($fields_info as $k) {
			if( is_string($k['default']) AND ($k['default'] != NULL) AND $k['type'] != 'timestamp'){
					$k['default'] = "'".$k['default']."'";
				
			}
			if(isset($k['name']) AND ($k['name'] != '' OR $k['name'] != NULL)){
				$query .= " ".$k['name'];
			}
			if(isset($k['type']) AND ($k['type'] != '' OR $k['type'] != NULL)){
				$query .= " ".$k['type'];
			}
			if(isset($k['length']) AND ($k['length'] != '' OR $k['length'] != NULL)){
				$query .= "(".$k['length'].")";
			}
			if(isset($k['nn']) AND $k['nn'] == 'on'){
				$query .= " NOT NULL";
			}
			if(isset($k['pri']) AND $k['pri'] == 'on'){
				$query .= " PRIMARY KEY";
			}
			if(isset($k['ai']) AND $k['ai'] == 'on'){
				$query .= " auto_increment";
			}
			if(isset($k['default']) AND ($k['default'] != '') OR $k['default'] != NULL){
				$query .= " DEFAULT " . $k['default'];
			}	
			if(isset($k['extra']) AND ($k['extra'] != '' OR $k['extra'] != NULL)){
				$query .= " ".$k['extra'];
			}
			if( sizeof($fields_info) != $times){
				$query .= ",";
			}
			$times++;
		}
		$query .= " );";
		$ctq = $this->db->query($query);
		if($ctq){
			redirect(base_url());
		}
		else{
			debug($this->db->error());
		}
	}

	public function delete_table(){
		$data['table_name'] = $this->router->segment();
		$this->load->view('delete_confirm_view',$data);
	}
	public function delete_handle(){
		$table_name = $this->router->segment();
		$query = "DROP TABLE ".$table_name;
		$dtq = $this->db->query($query);
		if($dtq){
			redirect(base_url());
		}
		else{
			debug($this->db->error());
		}
	}
	public function truncate(){
		$table_name = $this->router->segment();
		$query = "TRUNCATE TABLE ".$table_name;
		$ttq = $this->db->query($query);
		if($ttq){
			redirect(base_url());
		}
		else{
			debug($this->db->error());
		}
	}
	public function add_column_1(){
		$data['table_name'] = $this->router->segment();
		$data['cols'] = $this->db->column_names($data['table_name']);
		$data['last_col'] = sizeof($data['cols'])-1;
		$this->load->view('add_column_view_1',$data);
	}
	public function add_column_2(){
		$table_name = $this->router->segment();
		$data['table_name'] = $table_name;
		unset($_POST['submit']);
		$data['details'] = $_POST;
		$this->load->view('add_column_view_2',$data);
	}
	public function add_column_handle(){
		unset($_POST['submit']);
		$query = "ALTER TABLE ".$_POST['table_name']." ADD";
		if( is_string($_POST['field_default']) AND ($_POST['field_default'] != NULL) AND $_POST['field_type'] != 'timestamp'){
					$_POST['field_default'] = "'".$_POST['field_default']."'";
				
			}
			if(isset($_POST['name']) AND ($_POST['name'] != '' OR $_POST['name'] != NULL)){
				$query .= " ".$_POST['name'];
			}
			if(isset($_POST['field_type']) AND ($_POST['field_type'] != '' OR $_POST['field_type'] != NULL)){
				$query .= " ".$_POST['field_type'];
			}
			if(isset($_POST['field_length']) AND ($_POST['field_length'] != '' OR $_POST['field_length'] != NULL)){
				$query .= "(".$_POST['field_length'].")";
			}
			if(isset($_POST['field_nn']) AND $_POST['field_nn'] == 'on'){
				$query .= " NOT NULL";
			}
			if(isset($_POST['field_pri']) AND $_POST['field_pri'] == 'on'){
				$query .= " PRIMARY KEY";
			}
			if(isset($_POST['field_ai']) AND $_POST['field_ai'] == 'on'){
				$query .= " auto_increment";
			}
			if(isset($_POST['field_default']) AND ($_POST['field_default'] != '') OR $_POST['default'] != NULL){
				$query .= " DEFAULT " . $_POST['field_default'];
			}	
			if(isset($_POST['field_extra']) AND ($_POST['field_extra'] != '' OR $_POST['field_extra'] != NULL)){
				$query .= " ".$_POST['field_extra'];
			}
			if(isset($_POST['after_col_name']) AND ($_POST['after_col_name'] != '' OR $_POST['after_col_name'] != NULL)){
				$query .= " AFTER " . $_POST['after_col_name'];
			}
		if($this->db->query($query)){
			redirect(base_url('Database/struc_table/'.$_POST['table_name']));
		}
		else{
			debug($this->db->error());
		}
	}
	public function delete_col(){
		$table_name = $this->router->segment();
		$col_name = $this->router->segment(4);
		$data = array(
			'table_name'=>$table_name,
			'col_name'=>$col_name
		);
		$this->load->view('d_c_c_view',$data);
	}
	public function delete_col_handle(){
		$table_name = $this->router->segment();
		$col_name = $this->router->segment(4);
		$query = "ALTER TABLE ".$table_name . " DROP COLUMN ".$col_name;
		if($this->db->query($query)){
			redirect(base_url('Database/struc_table/'.$table_name));
		}
		else{
			debug($this->db->error());
		}
	}
	public function show_all_db(){
		$query = "SELECT SCHEMA_NAME FROM information_schema.SCHEMATA";
		$x = $this->db->query($query)->fetch_all(MYSQLI_ASSOC);
		if(!$x){
			debug($this->db->error());
		}
		else{
			debug($x);
		}
	}

}