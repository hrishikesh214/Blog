<?php
/**
 * ---------------------------------------------------------------------------
 * ---------------------------- CodeRunner -----------------------------------
 * ---------------------------------------------------------------------------
 *
 * ---------------------------------------------------------------------------
 *
 *      This is a framework which is based on modern M.V.C. type.
 *      Here you can make your apps with the fastest and neatly maintained code.
 *      Its inbuilt with a Routing System.
 *      Url Matches With the ControllerName / MethodName
 *      Only called method is executed... In this way your code is properly
 *      maintained!
 *
 * ---------------------------------------------------------------------------
 *
 *      This software is provided "AS IS", Without any Security.
 *      Some simple securities are taken into consideration under Security
 *      class / This is automatically loaded as $this->security-> (...)
 *      Its always appreciable if you check for security and not as provided!
 *      Some Library functions are called automatically as a page loads...
 *      ** BETTER NOT TO CHANGE SYSTEM FOLDER , OR ELSE GENERATES ERROR **
 *
 * ----------------------------------------------------------------------------
 *
 *  @package 	CodeRunner
 *  @author 	Hrishikesh Vaze
 *  @link 		coming soon
 *  @since 		Version 1.0
 *  @filesource
 *
 */
	class CR_Database {
		private $con;
		private $_select;
		private $_where;
		private $_from;

		function __construct(){
			global $DATABASE;
			if( $DATABASE['status'] ){
				try{
					$this->con = new mysqli( $DATABASE['hostname'], $DATABASE['username'], $DATABASE['password'] );
					if(isset($DATABASE['dbname']) AND $DATABASE['dbname'] != '' OR $DATABASE['dbname'] != NULL){
						$this->select_db($DATABASE['dbname']);
					}
				}
				catch( mysqli_sql_exception $x ){
					exit( '<h2>Database Connection Not Established!</h2>' );
				}
			}
		}
		public function select_db($dbname){
			$this->con->select_db($dbname);
		}
		function is_array_empty( $arr ){
			if( is_array( $arr ) ){
				foreach( $arr as $key => $value ){
					if( !empty( $value ) || $value != NULL || $value != "" || $value == 1 || $value == 0){
						return false;
					}
					break;
				}
				return true;
			}
			else{
				return true;
			}

		}

		public function select( ...$e ){
			$this->_select = "SELECT ";
			foreach ( $e as $x ) {
				if( isset( $e ) AND ( $e != NULL OR $e != '' ) ){
					$this->_select .=  $x ;
				}
				if( $x != $e[ sizeof($e)-1 ] ){
					$this->_select .= ", ";
				}
				else{
					$this->_select .= " ";
				}
			}
		}

		public function where( array $e ){
			if( ! $this->is_array_empty( $e ) ){
				$where_keys = array();
				$where_values = array();
				foreach ( $e as $key => $value ) {
					array_push($where_keys, $key);
					array_push($where_values, $value);
				}
				$i = sizeof($where_keys);
				$query = " WHERE ";
				for ( $x=0; $x < $i; $x++ ) {
					$here_value = ( is_int( $where_values[$x] ) )?intval( $where_values[$x] ):"'".$where_values[$x]."'";
					$query .= "`{$where_keys[$x]}` = {$here_value}";
					if( $x != ( $i-1 ) ){ $query .= ", "; }
					else{ $query .= " "; }
				}
				$this->_where = $query;
			}
			else{
				exit( "where() expects array as parameter!" );
			}
		}

		public function from( $e ){
			if($e != '' OR $e != NULL ){
				$this->_from = ' FROM `'.$e.'` ';
			}
			else{
				exit("from() expects table_name as parameter 1, Null given...");
			}
		}

		public function get( $e='' ){
			if( ( $e == '' OR $e == NULL ) AND ( $this->_from == '' OR $this->_from == NULL) ){
				exit( "get() expects table_name as parameter 1 when from() is not used!, Null given..." );
			}
			else{
				if( $e == '' ){ $table_name = $this->_from; }
				else{ $table_name = " FROM `".$e.'`'; }
				if( ! isset( $this->_select ) OR $this->_select == '' ){ exit( 'select() is not called!' ); }
				$query = "{$this->_select}{$table_name}";
				if( isset( $this->_where ) ){ $query .= $this->_where; }
				return $this->con->query( $query );
			}
		}
		public function query($e ){
			return $this->con->query( $e );
		}

		public function error(){
			return $this->con->error;
		}

		public function insert( $table_name = NULL, $e = array() ){
			if( $table_name == NULL OR $table_name == '' ){
				exit( "<pre>insert() expects table_name as a parameter 1, Null given..." );
			}
			else if( $this->is_array_empty( $e ) ){
				exit( "<pre>insert() expects array as parameter 2, Null given..." );
			}
			else{
				$insert_keys = array();
				$insert_values = array();
				foreach ( $e as $key => $val ) {
					array_push($insert_keys, $key);
					array_push($insert_values, $val);
				}
				$i = sizeof( $insert_keys );
				$query = "INSERT INTO `{$table_name}` ";
				for($x=0;$x<$i;$x++){
					$insert_keys[$x] = "`" . $insert_keys[$x] . "`";
					if( is_int($insert_values[$x])){
						$insert_values[$x] = intval($insert_values[$x]);
					}
					else{
						$insert_values[$x] = "'" . $insert_values[$x] . "'";
					}
				}
				$insert_keys = implode(', ', $insert_keys);
				$insert_values = implode(', ', $insert_values);
				$query .= "({$insert_keys}) VALUES ({$insert_values})";
				return $this->con->query($query) or $this->error();
			}
		}

		public function delete( $table_name ){
			if(  is_int( $table_name ) OR ( $table_name == '' OR $table_name == NULL ) ){
				exit("<pre>delete() expects table_name as parameter 1, Null given");
			}
			else if( ! isset($this->_where ) ){exit("<pre>delete() needs where() to be called before! ");}
			else{
				$query = "DELETE FROM `{$table_name}`";
				if( isset( $this->_where ) ){
					$query .= str_replace(",", " AND", $this->_where);
				}
				return $this->con->query( $query );
			}
		}

		public function update( $table_name, array $e ){
			if( is_int( $table_name ) OR ( $table_name == '' OR $table_name == NULL ) ){
				exit("<pre>update() expects table_name as parameter 1, Null given");
			}
			else if( $this->is_array_empty( $e ) ){
				exit("<pre>update() expects array as parameter 2, Null given ");
			}
			else if( ! isset($this->_where ) ){exit("<pre>update() needs where() to be called before! ");}
			else{
				$query = "UPDATE `{$table_name}` SET ";

				$set_keys = array();
				$set_values = array();
				foreach ( $e as $key => $value ) {
					array_push($set_keys, $key);
					array_push($set_values, $value);
				}
				$i = sizeof( $set_keys );
				for ( $x=0; $x < $i; $x++ ) {
					$here_value = ( is_int( $set_values[$x] ) )?intval( $set_values[$x] ):"'".$set_values[$x]."'";
					$query .= "`{$set_keys[$x]}` = {$here_value}";
					if( $x != ( $i-1 ) ){ $query .= ", "; }
					else{ $query .= " "; }
				}

				if( isset( $this->_where ) ){
					$query .= str_replace(",", " AND", $this->_where);
				}
				return $this->con->query($query);
			}
		}

		public function count_columns($table_name){
			$sql = "SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = database() AND table_name = '" .$table_name."'";
			return $this->query($sql)->fetch_all()[0][0];
		}

		public function column_names($table_name){
			return $this->query("SELECT column_name FROM information_schema.columns WHERE table_schema = database() AND table_name  = '".$table_name."'")->fetch_all();
		}
		public function get_primary_column($table_name){
			$sql = "SELECT column_name FROM information_schema.columns WHERE table_schema = database() AND COLUMN_KEY = 'PRI' AND table_name  = '".$table_name."'";
			return $this->query($sql)->fetch_all();
		}
		public function is_pri_aval($table_name){
			$check = $this->get_primary_column($table_name);
			return (isset($check[0][0])?true:false);
		}
	}