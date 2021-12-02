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

	if( substr($base_url, -1) != '/' ){
		$base_url .= '/';
	}

	function debug($var){
    	echo "<pre>";
    	print_r($var);
    	echo "</pre>";
    }

    function base_url($path=''){
		global $base_url;
		$e = $base_url ;
		if( ! $path == '' OR ! $path == NULL){
			$e .= $path;
		}
		return $e;
    }

    function redirect($link){
		header('location: '. $link);
    }
?>