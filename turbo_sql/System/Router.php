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
	defined('BASEPATH') or exit("<h2>Direct Script Not Allowed!</h2>");

	class CR_Router{

	    public function getUrlBlocks(){
	        $e = isset($_GET['URL'])?$_GET['URL']:NULL;
	        $e = explode('/', $e );
	        if( end( $e ) == '' or end($e ) == '' ){
	            unset($e[ sizeof($e)-1 ]);
	        }
	        if($e == NULL){
	            return false;
	        }
	        return $e;
	    }

	    public function segment($number = 3){
	        $url = $this->getUrlBlocks();
	        if($url == NULL){
	            return false;
		    }
			$number = $number - 1;
	        if( ! isset($url[$number]) ){
		        return false;
		    }
	        return $url[ $number ];
	    }
	}