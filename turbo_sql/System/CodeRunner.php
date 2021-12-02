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

	class CodeRunner{

		public $router;
		public $db;
		public $load;

		public function set_obj(){
		    $this->router = $this->load_class('Router');
		    $this->load   = $this->load_class('Load');
		    $this->db     = $this->load_class('Database');
	    }

	    public function load_class($name){
	    	$path = BASEPATH.'/'.$name.'.php';
	    	if( ! file_exists($path)){
	    		trigger_error('Unable to locate '.$name.'.php');
	    		die();
		    }
	    	include_once $path;
	    	$class_name = 'CR_' . $name;
	    	if( ! class_exists($class_name)){
	    		trigger_error('Class not found with name: '.$class_name);
	    		die();
		    }
	    	$x = new $class_name();
	    	return $x;
	    }
	}
	require_once APPPATH . '/Config.php';
	require_once BASEPATH . '/Load.php';
	require_once BASEPATH . '/Library.php';
	$_CR = new CR_Load();
	$_CR -> start();
?>