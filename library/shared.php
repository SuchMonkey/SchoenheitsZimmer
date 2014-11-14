<?php

/**
 * Collection of shared function necessary for the framework
 * 
 * Copyright (C) 2014  gcarq
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
 * @since 15.3.2014
 *
 * @package minPHP
 */


/** Autoload any classes that are required **/
function __autoload($className) {
	//echo strtolower($className);
	//echo '<br>';
	if (file_exists(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php')) {
		require_once(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php');
	} else if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php');
	} else if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php');
	} else if (file_exists(ROOT . DS . 'application' . DS . 'tools' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'application' . DS . 'tools' . DS . strtolower($className) . '.php');
	} else {
		//TODO: log me
	}
}

/** Remove HTML special characters, 
 * if param is an array it will call this method on each value 
 * 
 * **/
function htmlSpecialCharsDeep($value) {
	$value = is_array($value) ? array_map('htmlSpecialCharsDeep', $value) : htmlspecialchars($value);
	return $value;
}


/** Simple Factory pattern for maintaining a PDO connection **/
class ConnectionFactory {

    protected static $_pdoHandle;

    public function getConnection() {
    	
        if (!self::$_pdoHandle) {
        	self::$_pdoHandle = new PDO(PDO_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD);
        	self::$_pdoHandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$_pdoHandle;
    }
}

/** Represents HTTP 404 **/
class PageNotFoundException extends Exception {
	//TODO: implement me
	public function __construct($message = null, $code = 0, Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}
	public function __toString() {
		return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
	}
}

/** Represents HTTP 403 **/
class NotAuthorizedException extends Exception {
	public function __construct($message = null, $code = 0, Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}
	public function __toString() {
		return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
	}	
}
