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
	class CR_Load{
		private $base_url;

	    public function set_base_url($base_url){
	        if( substr($base_url,-1) != '/'){
				$base_url .= '/';
		    }
	        $this->base_url = $base_url;
	    }


	    public function base_url($path=''){
	        $e = $this->base_url;
	        if( ! $path == '' OR ! $path == NULL){
	            $e .= $path;
		    }
	        return $e;
	    }

		public function required(){
			set_error_handler(array($this,"show_error"));
		}

	    public function start(){
	        $file_path = APPPATH . "/core/";
	        $this->required();

	        global $landing_controller;
	        include_once 'Router.php';
	        $router = new CR_Router();

	        $class_name = $router->segment(1);
	        $method = $router->segment(2);

	        if($class_name == false){
	            $class_name = $landing_controller;
		    }

			$class = $class_name;

	        if( ! file_exists( $file_path . $class . '.php' ) ){
				trigger_error("<b>". $class . "</b> Not Found! in Path :- <b>" . $file_path . '</b>');
		        die();
	        }
	        if($method == false){
	            $method = 'index';
		    }
		    include_once $file_path . $class . '.php';
		    $class = new $class();

	        if( ! method_exists($class, $method)){
	            trigger_error($method . " Not Found in ".$class_name . '.php');
	            die();
		    }
	        $class->set_obj();
	        $class->$method();
	    }

	    public function view($name,$vars = array()){
	        if( isset( $name ) AND ( $name != '' OR $name != NULL) ){
	            $file_path = APPPATH . '/views/';
	            $check = glob($file_path . $name . '*');
	            if( is_array($check) AND sizeof($check)>0 ){
	                $filename = $check[0];
	                if( file_exists($filename)){
					    if( isset($vars) AND is_array($vars)){
					        if(sizeof($vars)>0){
							    extract($vars);
						    }
					    }
					    else{
					        trigger_error('view() accepts parameter 2 to be an array!');
					    }
	                    include $filename;
				    }
	                else{

	                    trigger_error( 'No file with name '.$filename );
				    }
			    }
	            else{
				    trigger_error( 'No file with name <b>'.$name.'</b> in <b>'.$file_path.'</b>' ,E_USER_ERROR);
			    }

		    }
	        else{
	            trigger_error('view() accepts parameter 1 to be a string...Null given!');
	            die();
		    }
	    }
		public function show_error($errno,$errstr,$non,$errln){
	        $error_data = debug_backtrace();
	        $data['error_data'] = $error_data[0]['args'];
			$this->view('error/err_general',$data);
			die();
		}
	}