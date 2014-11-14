<?php

/**
 * Dispatches the given user request and call the appropriate action
 * Copyright (C) 2014  gcarq
 * 
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *     
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *   
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * This class also handles error reporting 
 * and sanitizes $_GET, $_POST, $_COOKIE variables
 *
 * @since 15.3.2014
 *
 * @package minPHP
 */

class Dispatcher {
	
	private $_url;
	private $_controllerInstance;
	
	public function __construct() {
		$this->setReporting();
		if(STRIP_HTMLSPECIALCHARS == TRUE) {
			$this->stripHtmlSpecialChars();
		}
		
		$this->_url = isset($_GET['url']) ? $_GET['url'] : '';
	}
	
	/** Set appropriate Error level **/
	private function setReporting() {
		error_reporting(E_ALL);
	    if (static::isDevEnvironment()) {
	    	ini_set('display_errors', 1);
	    } else {
	    	ini_set('display_errors', 0);
	    	ini_set('log_errors', 1);
	    	ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
	    }
	}
		
	/** Strip html tags to prevent XSS **/
	private function stripHtmlSpecialChars() {
		$_GET 		= htmlSpecialCharsDeep($_GET);
		$_POST 		= htmlSpecialCharsDeep($_POST);
		$_COOKIE 	= htmlSpecialCharsDeep($_COOKIE);
	}
	

	
	/** Unsets _SESSION, _POST, _GET, _COOKIE, 
	 * _REQUEST, _SERVER, _ENV and _FILES in GLOBALS array **/
	public function unregisterGlobals() {
	    if (ini_get('register_globals')) {
	        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
	        foreach ($array as $value) {
	            foreach ($GLOBALS[$value] as $key => $var) {
	                if ($var === $GLOBALS[$key]) {
	                    unset($GLOBALS[$key]);
	                }
	            }
	        }
	    }
	}
	/** Explodes Url to Controller, Action and QueryString 
	 *  i.e. http://localhost/items/details/421245611/
	 * 			     			|      |       |
 	 * 				      Controller action QueryString
	 * 
	/** and creates the appropriate controller and action **/
	public function dispatch() {
	    try {
	    	$tmpController = '';
	    	$tmpAction = '';
	    	$tmpQueryString = array();
			
			// Explode URL	)
			$urlArray = array();
			$urlArray = explode("/", rtrim($this->_url, "/"));
			$arrayLength = count($urlArray);
			
			// Check if we should show the landing page
			if($arrayLength <= 1 && empty($urlArray[0])) {
				Header("Location: " . LANDING_PAGE);
				exit();
			}
			
			// Check if at least controller and action are given
			if($arrayLength < 2) {
				// Check if default actions are enabled
				if(HANDLE_DEFAULT_ACTIONS == FALSE || empty($urlArray[0])) {
					throw new PageNotFoundException("No controller or action given");
				}
				$tmpController = $urlArray[0];
				$tmpAction = "default_action";
			} else {
				$tmpController = array_shift($urlArray);
				
				$tmpAction = array_shift($urlArray);
			}
			
			if(!is_null($urlArray) && !empty($urlArray)) {
				foreach($urlArray as $param) {
					$tmpQueryString[] = str_replace('^', '/', strtolower($param));
				}
			}
			
			// Define necessary environment variables
	    	$viewsFolder = $tmpController;
	    	$controllerClassName = ucwords($tmpController);
	    	$modelClassName = rtrim($controllerClassName, 's');
	    	$controllerClassName .= 'Controller';
			$action = $tmpAction;
			$parameters = $tmpQueryString;
			
	        // Check if controller class exists
	        if (!class_exists($controllerClassName)) {
	            throw new PageNotFoundException('Class ' . $controllerClassName . ' not found');
	        }
			
	    	$this->_controllerInstance = new $controllerClassName($modelClassName, $viewsFolder, $action);
	    
	    	if ((int)method_exists($controllerClassName, $action)) {
	    		// Call controller action
	    		call_user_func_array(array($this->_controllerInstance, $action), $parameters);
	    	} else {
	    		throw new PageNotFoundException('Method does not exist ('.$action.')');
	    	}
			
			exit();
			
	    } catch(PageNotFoundException $e) {
	    	
    		Logger::error('Dispatcher::PageNotFoundException: ' . $e->getMessage());
    		static::throw404();
		} catch(NotAuthorizedException $e) {
			
    		Logger::error('Dispatcher::NotAuthorizedException: ' . $e->getMessage());
    		//static::throw404();
	    } catch(PDOException $e) {
	    	
    		Logger::error('Dispatcher::PDOException: ' . $e->getMessage());
    		//static::throw404();
	    } catch(Exception $e) {
	    	
	    	Logger::error('Dispatcher::' . get_class($e) . ": " . $e->getMessage());
	    	//static::throw404();
	    }
	}
	
	/** Check if environment is DEV **/
	public static function isDevEnvironment() {
		return DEVELOPMENT_ENVIRONMENT;
	}
	
	/** Displays a 404 Error Page and exit's() **/
	public static function throw404($message = null) {
		header('HTTP/1.1 404 Not Found', true, 404);
		exit($message);		
	}
	
	/** Refreshs the current URL as HTTPS if its a HTTP session **/
	public static function forceHTTPS() {
		if($_SERVER["HTTPS"] != "on")
		{
		    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
		    exit();
		}
	}
	
}