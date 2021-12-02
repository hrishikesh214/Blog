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
 *  @package CodeRunner
 *  @author Hrishikesh Vaze
 *  @link coming soon
 *  @since Version 1.0
 *  @filesource
 *
 */

/*
 * ----------------------------------------------------------------------------
 *      Lets Define Environment
 * ----------------------------------------------------------------------------
 *
 *      You can load different environments depending on what you are doing
 *      But there are 3 environment:
 *      1. development
 *      2. testing
 *      3. deployed
 *
 * ---------------------------------------------------------------------------
 * Note : If you change this you even change error_reporting!
 */
	define('ENVIRONMENT','development');

/*
 * --------------------------------------------------------------------------
 * ---- ERROR REPORTING -----------------------------------------------------
 * --------------------------------------------------------------------------
 */

	switch(ENVIRONMENT){
		case 'development':
			error_reporting(-1);
			break;

		case 'testing':
		case 'deployed':
			if (version_compare(PHP_VERSION, '5.3', '>=')){
				error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
			}
			else{
				error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
			}
			break;

		default:
			header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
			echo 'The application environment is not set correctly.';
			die();
	}
/*
 * -----------------------------------------------------------------------------
 *      Lets Set Version!
 * -----------------------------------------------------------------------------
 *
 */
	define('CR_VER',1.0);
/*
 * -----------------------------------------------------------------------------
 *      Lets set App directory Name
 * -----------------------------------------------------------------------------
 *
 */
	define('APPPATH','App');
/*
 * -----------------------------------------------------------------------------
 *      Lets set System directory Name
 * -----------------------------------------------------------------------------
 *
 */
	define('BASEPATH','System');
/*
 * ---------------------------------------------------------------------------
 *      Are paths correct? , If not then die!
 * ---------------------------------------------------------------------------
 */
	if( ! is_dir(BASEPATH)){
	    trigger_error(BASEPATH." Not found!");
	}

	if( ! is_dir(APPPATH)){
	    trigger_error(APPPATH." Not found!");
	}
/*
 * ---------------------------------------------------------------------------
 *      Yay ! All set!
 * ---------------------------------------------------------------------------
 *      And here We Go!
 * ---------------------------------------------------------------------------
 */
	require_once BASEPATH . '/CodeRunner.php';
