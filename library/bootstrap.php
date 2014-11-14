<?php

/**
 * Include necessary framework files and execute dispatcher
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


require_once (ROOT . DS . 'config' . DS . 'config.php');
require_once (ROOT . DS . 'library' . DS . 'shared.php');
require_once (ROOT . DS . 'library' . DS . 'logger.class.php');
require_once (ROOT . DS . 'library' . DS . 'dispatcher.class.php');
require_once (ROOT . DS . 'library' . DS . 'sessionmanager.class.php');


/* Check if config settings are defined otherwise set default value 
 * See config.php */

if(!defined('LANDING_PAGE'))
	define ('LANDING_PAGE', '/'); 
 
if(!defined('DEVELOPMENT_ENVIRONMENT'))
	define ('DEVELOPMENT_ENVIRONMENT', FALSE);

if(!defined('HANDLE_DEFAULT_ACTIONS'))
	define ('HANDLE_DEFAULT_ACTIONS', FALSE);

if(!defined('STRIP_HTMLSPECIALCHARS'))
	define('STRIP_HTMLSPECIALCHARS', TRUE);

if(!defined('PDO_DRIVER'))
	define('PDO_DRIVER', 'mysql');	

if(!defined('DB_NAME'))
	define('DB_NAME', '');	

if(!defined('DB_USER'))
	define('DB_USER', '');	

if(!defined('DB_PASSWORD'))
	define('DB_PASSWORD', '');	

if(!defined('DB_HOST'))
	define('DB_HOST', 'localhost');	


$dispatcher = new Dispatcher();
$dispatcher->dispatch();
$dispatcher->unregisterGlobals();

